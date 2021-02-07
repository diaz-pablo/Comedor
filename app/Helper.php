<?php

namespace App;

class Helper {
    public static function uploadFile($inputName, $folderName)
    {
        request()->file($inputName)->store($folderName);

        return request()->file($inputName)->hashName();
    }
}
