<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinyCart Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-300 mx-10">
    
    <x-header/>

    <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-5">Iniciar Sesión</h1>    
    <h2 class="text-xl text-gray-800 text-center my-5">Logeate como administrador para ver el dashboard.</h2>

    <form class="flex flex-col gap-6 items-center justify-center p-10 bg-white rounded-lg shadow-lg w-full max-w-lg mx-auto" 
    action="{{route('login')}}"     
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

        <!-- Campo Email -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="email">Email</label>
            <input class="border-2 border-gray-300 hover:border-emerald-400 focus:ring focus:ring-emerald-200 transition-all rounded-md p-2 w-full" 
                   type="email" name="email" id="email" placeholder="admin@example.com" required>
        </div>

        <!-- Campo Email -->
        <div class="flex flex-col gap-2 w-full">
            <label class="font-semibold text-lg hover:underline" for="password">Contraseña</label>
            <input class="border-2 border-gray-300 hover:border-emerald-400 focus:ring focus:ring-emerald-200 transition-all rounded-md p-2 w-full" 
                    type="password" name="password" id="password" placeholder="admin" required>
        </div>
        
        <!-- Botón de envío -->
        <input class="bg-emerald-500 text-white py-2 px-6 rounded-md font-bold cursor-pointer hover:bg-emerald-600 transition-all" 
        type="submit" value="Iniciar Sesión">

    </form>

    <x-footer/>

</body>
</html>