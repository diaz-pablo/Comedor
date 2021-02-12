<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dessert;
use App\Models\Main;
use App\Models\Menu;
use App\Models\Starter;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('service_at', '>=', now()->format('Y-m-d'))
            ->with(['starter', 'main', 'dessert'])
            ->orderBy('service_at')
            ->paginate(6);

        return view('admin.menus.index', compact('menus'));
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

    public function destroy($id)
    {
        //
    }
}
