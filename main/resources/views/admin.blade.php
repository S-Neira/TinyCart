<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TinyCart | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-300 mx-10">
    
    <x-header></x-header>

    <h1 class="text-4xl font-extrabold text-center text-gray-800 my-8">Panel de control</h1>

    <main class="flex flex-col gap-6 items-center justify-center p-10 bg-white rounded-lg shadow-lg w-full max-w-lg mx-auto">
        <a href="{{route('products.create')}}" class="bg-emerald-400 hover:bg-emerald-600 transition-all py-2 px-4 font-semibold rounded-md">
            Crear
        </a>

        {{-- mostrar todos los  Productos --}}
        @foreach ($products as $product)
            <div class="flex flex-col gap-4 shadow-md">
                <h3 class="text-xl font-semibold">{{$product->name}}</h3>
                <p class="text-lg font-semibold text-emerald-500">{{$product->price}}</p>
                <p class="text-sm">{{$product->description}}</p>
                <img  src="{{ asset('storage/products/' . $product->image) }}" alt="Imagen de producto {{ $product->name }}">

            </div>

        @endforeach

    </main>

    <x-footer></x-footer>
</body>
</html>