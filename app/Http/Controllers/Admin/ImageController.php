<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2048'
        ]);

        $menu->images()->create([
            'url' => Helper::uploadFile('image', 'menus')
        ]);
    }

    public function destroy(Image $image)
    {
        // TODO: Usar try catch
        $image->delete();

        Helper::deleteFile($image->url);

        session()->flash('alert', ['success', '¡Hurra! Todo salió bien, ', 'la imágen del menú ha sido eliminada exitosamente.']);
        return back();
    }
}
