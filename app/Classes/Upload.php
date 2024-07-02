<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Upload
{
    public static function uploadImage($image)
    {
        if ($image !== null) {
            $path = 'uploads/photos/' . date('Y') . '/' . date('m') . '/';
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            // Store the image in the def  $storedPath = $file->storeAs($path, $name, 'public');
            $storedPath = $image->storeAs($path, $filename, 'public');
            $url = Storage::url($storedPath);

            return asset($url);
        }
        return null;
    }
}
