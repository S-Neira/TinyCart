<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class ImageController extends Controller
{

    public static function optimizeImage($imagePath){

        $manager = new ImageManager(new Driver());

        $fullPath = storage_path('app/public/' . $imagePath);

        $image = $manager->read($imagePath);

        $image->scale(1080);
    
        // Guardar como WebP con calidad 85
        $optimizedPath = str_replace(pathinfo($fullPath, PATHINFO_EXTENSION), 'webp', $fullPath);
        $image->toWebp(quality: 85)->save($optimizedPath);
    
        // Reemplazar el archivo original con la imagen optimizada
        if (file_exists($optimizedPath)) {
            unlink($fullPath); // Elimina el archivo original
            rename($optimizedPath, $fullPath); // Renombra la imagen optimizada
        }
    
        // Optimización adicional con Spatie
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($fullPath);

    }
}
