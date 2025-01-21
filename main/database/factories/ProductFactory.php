<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // Ruta de la carpeta donde están las imágenes
        $imageDirectory = public_path('storage/products');

        // Obtener todas las imágenes de la carpeta
        $images = glob($imageDirectory . '/*.{jpg,png,jpeg,webp}', GLOB_BRACE);

        // Seleccionar una imagen aleatoria
        $randomImage = count($images) > 0 ? basename($images[array_rand($images)]) : null;

        return [
            'name' => fake()->name(),
            'description' => fake()->text(120),
            'price' => fake()->numberBetween(0, 50000),
            'image' => $randomImage,
            'inventory' => fake()->numberBetween(0, 200),
        ];
    }
}
