<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Menu;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2048'
        ]);

        $images = $request->file('image');
    }
}
