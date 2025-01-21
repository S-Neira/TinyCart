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
          action="{{route('products.store')}}" 
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

        <!-- Campo Nombre -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="name">Nombre del Producto:</label>
            <input class="border-2 border-gray-300 hover:border-emerald-400 focus:ring focus:ring-emerald-200 transition-all rounded-md p-2 w-full" 
                   type="text" name="name" id="name" placeholder="Nombre del Producto" required>
        </div>

        <!-- Campo Precio -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="price">Precio:</label>
            <input class="border-2 border-gray-300 hover:border-emerald-400 focus:ring focus:ring-emerald-200 transition-all rounded-md p-2 w-full" 
                   type="number" name="price" id="price" placeholder="10000" required>
        </div>

        {{-- Campo Stock --}}
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="inventory">Stock: </label>
            <input class="border-2 border-gray-300 hover:border-emerald-400 focus:ring focus:ring-emerald-200 transition-all rounded-md p-2 w-full" 
                   type="number" name="inventory" id="inventory" placeholder="0">
        </div>

        <!-- Campo Imagen -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="image">Imagen:</label>
            <input class="border-2 border-gray-300 rounded-md p-2 w-full" 
                   type="file" name="image" id="image" accept="image/*" required>
        </div>

        <!-- Campo Descripción -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="description">Descripción:</label>
            <textarea class="border-2 border-gray-300 hover:border-emerald-400 focus:ring focus:ring-emerald-200 transition-all rounded-md p-2 w-full" 
                      name="description" id="description" cols="30" rows="5" placeholder="Describe el producto" required></textarea>
        </div>

        <!-- Botón de envío -->
        <input class="bg-emerald-500 text-white py-2 px-6 rounded-md font-bold cursor-pointer hover:bg-emerald-600 transition-all" 
               type="submit" value="Crear">

    </form>

    <x-footer></x-footer>

</body>
</html>
