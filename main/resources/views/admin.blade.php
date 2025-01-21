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

    <h1 class="text-4xl font-extrabold text-center text-gray-800 my-8 w-auto">
        Panel de control
    </h1>

    {{-- Muesta este mensaje si no hay productos para mostrar --}}

    @if($products->isEmpty())
        <h1 class="font-extrabold text-2xl text-center text-gray-800 mb-5">
            No tienes ningún producto todavía 😢
        </h1>
    @endif 
        
    <main class="flex flex-col items-center gap-5">

        <a href="{{route('products.create')}}" class="bg-emerald-400 hover:bg-emerald-600 transition-all py-2 px-4 font-semibold rounded-md">
            Crear
        </a>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-10 bg-white rounded-lg shadow-lg w-full mx-auto">

            {{-- mostrar todos los  Productos --}}
            @foreach ($products as $product)
                <div class="flex flex-col items-center justify-center gap-4">
                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="Imagen de producto {{ $product->name }}">

                    <h3 class="text-xl font-semibold">{{$product->name}}</h3>
                    <div class="flex gap-2">
                        <p class="text-lg font-semibold" >Precio: </p>
                        <p class="text-lg font-semibold text-emerald-500">{{$product->price}}</p>
                    </div>

                    <h3 class="text-lg">Stock: {{$product->inventory}}</h3>
                    
                    <p class="text-md">{{$product->description}}</p>
        
                    <div
                        x-data="{ visible: false }"
                        class="flex gap-5 justify-center"
                        x-cloak
                    >
                        <button
                            @click="visible = true"
                            class="bg-red-400 py-2 px-4 font-semibold text-white hover:bg-red-600 transition-all rounded-md"
                        >
                            Eliminar
                        </button>
                    
                        <!-- El modal con animación -->
                        <template x-teleport="body">
                            <div
                                x-show="visible"
                                x-cloak
                                class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                            >
                                <div
                                x-show="visible" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="flex flex-col gap-5 bg-white shadow-md rounded-lg p-5"
                                @click.outside="visible = false"
                                >
                                    <h1 class="text-xl font-semibold text-center my-2">
                                        ¿Estás Seguro de que quieres eliminar este elemento?
                                    </h1>
                        
                                    <p class="text-lg bg-gray-300 p-5 rounded-md">
                                        Esta acción es irreversible. Para cualquier duda contacte a 
                                        <span class="font-semibold">sneira.dev@gmail.com</span>.
                                    </p>
                        
                                    <div class="flex gap-3 justify-center">
                                        <button 
                                            @click="visible = false" 
                                            class="bg-gray-400 py-2 px-4 font-semibold text-white hover:bg-gray-600 transition-all rounded-md"
                                        >
                                            Cancelar
                                        </button>

                                        <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Confirmar" class="bg-red-400 py-2 px-4 font-semibold text-white hover:bg-red-600 transition-all rounded-md">
                                        </form>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </template>
                        
                        <a href="{{route('products.edit', $product->id)}}" class="bg-yellow-400 py-2 px-4 font-semibold text-white hover:bg-yellow-600 transition-all rounded-md">
                            Actualizar
                        </a>
                    </div>
                </div>
            @endforeach   
        </div>



    </main>

    <x-footer></x-footer>
</body>
</html>