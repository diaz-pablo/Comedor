<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dessert;
use App\Models\Main;
use App\Models\Menu;
use App\Models\Starter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $menus = Menu::where('service_at', '>=', now()->format('Y-m-d'))
                ->with(['starter', 'main', 'dessert'])
                ->get();

            return datatables()
                ->of($menus)
                ->addColumn('actions', 'admin.menus.partials.actions')
                ->rawColumns(['actions'])
                ->toJson();
        }

        return view('admin.menus.index');
    }

    public function create()
    {
        $starters = Starter::all();
        $mains = Main::all();
        $desserts = Dessert::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Menu $menu)
    {
        $alertColor = 'success';
        $alertTitle = '¡Hurra! Todo salió bien, ';
        $alertMessage = 'el menú ha sido eliminado exitosamente.';

        DB::beginTransaction();
        try {
            $menu->delete();
            // TODO: Eliminar todas las imágenes.
            // TODO: Hacer esto en un observer.
            DB::commit();
        } catch (\Exception $exception) {
            $alertColor = 'danger';
            $alertTitle = '¡Ups! Algo salió mal, ';
            $alertMessage = $exception->getMessage();

            DB::rollBack();
        }

        session()->flash('alert', [$alertColor, $alertTitle, $alertMessage]);
        return redirect()->route('admin.menus.index');
    }
}
