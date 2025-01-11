<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Image\Image;

class OptimizeImages extends Command
{
    // Nombre y descripción del comando
    protected $signature = 'images:optimize';
    protected $description = 'Optimize all images in "img" and "items" folders and convert them to WebP';

    public function handle()
    {
        // Define las carpetas de origen
        $folders = [
            public_path('img'),
            public_path('items'),
        ];

        foreach ($folders as $folder) {
            $this->info("Optimizing images in folder: {$folder}");

            // Buscar imágenes en el directorio
            $files = glob($folder . '/*.{jpg,jpeg,png}', GLOB_BRACE);

            foreach ($files as $file) {
                // Ruta de la imagen optimizada
                $optimizedPath = pathinfo($file, PATHINFO_DIRNAME) . '/' . pathinfo($file, PATHINFO_FILENAME) . '.webp';

                // Convierte y guarda la imagen en formato WebP
                try {
                    Image::load($file)
                        ->format('webp')
                        ->save($optimizedPath);

                    $this->info("Optimized: {$file} -> {$optimizedPath}");
                } catch (\Exception $e) {
                    $this->error("Failed to optimize: {$file}. Error: {$e->getMessage()}");
                }
            }
        }

        $this->info('All images have been optimized.');
    }
}
