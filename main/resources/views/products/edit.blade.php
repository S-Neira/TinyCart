<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TinyCart | Create</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 mx-10">

    <x-header></x-header>
    
    <h1 class="text-4xl font-extrabold text-center text-gray-800 my-8">Crea un producto</h1>

    <form class="flex flex-col gap-6 items-center justify-center p-10 bg-white rounded-lg shadow-lg w-full max-w-lg mx-auto" 
          action="{{route('products.update', $product->id)}}" 
          method="POST" 
          enctype="multipart/form-data"
    >

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="font-semibold text-lg text-red-300">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @csrf
        @method('PATCH')

        <!-- Campo Nombre -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="name">Nombre del Producto:</label>
            <input class="border-2 border-gray-300 hover:border-emerald-400 focus:ring focus:ring-emerald-200 transition-all rounded-md p-2 w-full" 
                   type="text" name="name" id="name" placeholder="Nombre del Producto" required value="{{old('name', $product->name)}}">
        </div>

        <!-- Campo Precio -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="price">Precio:</label>
            <input class="border-2 border-gray-300 hover:border-emerald-400 focus:ring focus:ring-emerald-200 transition-all rounded-md p-2 w-full" 
                   type="number" name="price" id="price" placeholder="10000" required value="{{old('price', $product->price)}}">
        </div>

        <!-- Campo Imagen -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="image">Imagen:</label>
            <input class="border-2 border-gray-300 rounded-md p-2 w-full" 
                   type="file" name="image" id="image" accept="image/*">
            
            <img src="{{ asset('storage/' . old('img', $product->image) ) }}" alt="Imagen Actual">
        </div>

        <!-- Campo Descripción -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="description">Descripción:</label>
            <textarea class="border-2 border-gray-300 hover:border-emerald-400 focus:ring focus:ring-emerald-200 transition-all rounded-md p-2 w-full" 
                      name="description" id="description" cols="30" rows="5" placeholder="Describe el producto" required>{{old('description', $product->description)}}</textarea>
        </div>

        <!-- Botón de envío -->
        <input class="bg-emerald-500 text-white py-2 px-6 rounded-md font-bold cursor-pointer hover:bg-emerald-600 transition-all" 
               type="submit" value="Actualizar">

    </form>

    <x-footer></x-footer>

</body>
</html>
