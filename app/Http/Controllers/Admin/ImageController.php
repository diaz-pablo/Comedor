<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use App\Models\Image;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function store(StoreImageRequest $request, Menu $menu)
    {
        DB::beginTransaction();
        try {
            $menu->images()->create(['url' => Helper::uploadFile('image', 'menus')]);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            session()->flash('alert', ['danger', '¡Ups! Algo salió mal, ', $exception->getMessage()]);
        }
    }

    public function destroy(Image $image)
    {
        $alertColor = 'success';
        $alertTitle = '¡Hurra! Todo salió bien, ';
        $alertMessage = 'la imágen del menú ha sido eliminada exitosamente.';

        DB::beginTransaction();
        try {
            $image->delete();

            DB::commit();
        } catch (\Exception $exception) {
            $alertColor = 'danger';
            $alertTitle = '¡Ups! Algo salió mal, ';
            $alertMessage = $exception->getMessage();

            DB::rollBack();
        }

        session()->flash('alert', [$alertColor, $alertTitle, $alertMessage]);
        return back();
    }
}
