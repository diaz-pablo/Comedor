<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuRequest;
use App\Models\Dessert;
use App\Models\Main;
use App\Models\Menu;
use App\Models\Starter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $datesDisabled = Menu::all()->pluck('service_at');

        if (request()->ajax()) {
            $menus = Menu::where('service_at', '>=', Carbon::now()->format('Y-m-d'))
                ->with(['starter', 'main', 'dessert'])
                ->get();

            return datatables()
                ->of($menus)
                ->addColumn('publication_at', 'admin.menus.partials.publication-at')
                ->addColumn('available_quantity', 'admin.menus.partials.available-quantity')
                ->addColumn('actions', 'admin.menus.partials.actions')
                ->rawColumns(['publication_at', 'available_quantity', 'actions'])
                ->toJson();
        }

        return view('admin.menus.index', compact('datesDisabled'));
    }

    public function store(StoreMenuRequest $request)
    {
        DB::beginTransaction();
        try {
            $menu = Menu::create($request->only('service_at'));

            DB::commit();

            return redirect()->route('admin.menus.edit', compact('menu'));
        } catch (\Exception $exception) {
            DB::rollBack();

            session()->flash('alert', ['danger', '¡Ups! Algo salió mal, ', $exception->getMessage()]);
            return redirect()->route('admin.menus.index');
        }
    }

    public function show(Menu $menu)
    {
        $menu->load(['user', 'starter', 'main', 'dessert', 'images'])->get();

        return view('admin.menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $menu->load(['starter', 'main', 'dessert', 'images'])->get();

        return view('admin.menus.edit', [
            'menu' => $menu,
            'starters' => Starter::all(),
            'mains' => Main::all(),
            'desserts' => Dessert::all(),
            'datesDisabled' => Menu::all()->pluck('service_at')
        ]);
    }

    public function update(StoreMenuRequest $request, Menu $menu)
    {
        $alertColor = 'success';
        $alertTitle = '¡Hurra! Todo salió bien, ';
        $alertMessage = 'los datos del menú han sido actualizados exitosamente.';

        DB::beginTransaction();
        try {
            $menu->update($request->all());

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

    public function destroy(Menu $menu)
    {
        $alertColor = 'success';
        $alertTitle = '¡Hurra! Todo salió bien, ';
        $alertMessage = 'el menú ha sido eliminado exitosamente.';

        DB::beginTransaction();
        try {
            $menu->delete();

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
