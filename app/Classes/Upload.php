<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Upload
{
    public static function uploadImage($image)
    {
        $imageSrc = env('IMAGE_SOURCE_PATH');
        if ($image !== null) {
            $path = $imageSrc . date('Y') . '/' . date('m');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            $storedPath = $image->storeAs($path, $filename);
            // Loai bo public/uploads/photos phu hop voi appServiceProvider
            $newPath = Str::replaceFirst($imageSrc, 'images/', $storedPath);
            return asset($newPath);
        }
        return null;
    }
}
