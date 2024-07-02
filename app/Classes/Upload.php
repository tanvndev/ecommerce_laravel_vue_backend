<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;

class Upload
{


    public static function uploadImage($image)
    {

        $imageSrc = env('IMAGE_SOURCE_PATH');
        if ($image != null) {
            $path = $imageSrc . date('Y') . '/' . date('m');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = $originalName . '_' . uniqid() . '.webp'; // Change the extension to .webp

            // Create the directory if it doesn't exist
            if (!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }

            // Optimize and convert the image to .webp
            $img = Image::make($image)
                ->encode('webp', 90); // Encode to .webp with 80% quality

            // Save the optimized image temporarily
            $temporaryPath = storage_path('app/temp/' . $filename);
            $img->save($temporaryPath);

            // Optimize the image further using spatie/image-optimizer
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($temporaryPath);

            // Move the optimized image to the final destination
            $storedPath = $path . '/' . $filename;
            Storage::put($storedPath, file_get_contents($temporaryPath));

            // Remove temporary file
            unlink($temporaryPath);

            // Remove 'public/uploads/photos' in accordance with AppServiceProvider
            $newPath = Str::replaceFirst($imageSrc, 'images/', $storedPath);
            return asset($newPath);
        }
        return null;
    }
}
