<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('admin', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'required|max:500',
                'price' => 'required|numeric',
                'image' => 'required|file|mimes:jpeg,png,jpg,gif,webp|max:10240',
            ],
            [
                'name.required' => 'El nombre del producto es obligatorio.',
                'description.required' => 'La descripción no puede estar vacía.',
                'price.required' => 'El precio es obligatorio.',
                'price.numeric' => 'El precio debe ser un número.',
                'image.required' => 'Por favor, sube una imagen del producto.',
                'image.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, gif.',
                'image.max' => 'La imagen no puede ser mayor a 10MB.',
            ]
        );

        

        //Guardar la imagen
        if($request->hasFile('image')){
            //Guardar en el almacenamiento publico
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath; // Ruta para guardaren la base de datos.
        }

        Products::create($validatedData);
        $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
