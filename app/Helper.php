<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class Helper {
    public static function uploadFile($inputName, $folderName)
    {
        $imageUrl = request()->file($inputName)->store('public/' . $folderName);

        return Storage::url($imageUrl);
    }

    public static function deleteFile($imageUrl)
    {
        $imagePath = str_replace('storage', 'public', $imageUrl);
        Storage::delete($imagePath);
    }
}
