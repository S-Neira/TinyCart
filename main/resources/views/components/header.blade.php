<header class="flex gap-[25%] items-center">

    
    <img src="{{asset('img/logo.webp')}}" alt="" class="max-w-[10%] rounded-full" >
    
    <nav class="flex justify-between w-full">

        <ul class="flex gap-20 font-semibold">
            <li class="hover:underline"><a href="/">Inicio</a></li>
            <li class="hover:underline"><a href="">Poductos</a></li>
            <li class="hover:underline"><a href="https://github.com/S-Neira/Me">Nosotros</a></li>

            @auth
                <li class="hover:underline">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Cerrar Sesión</button>
                    </form>
                </li>
            @else
                <li class="hover:underline"><a href="{{route('login-form')}}">Admin</a></li>
            @endauth
        </ul>

        <ul class="flex gap-5 mr-10">

            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-6 hover:scale-110 transition-all">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>

            </a>

            <a href="{{route('cart')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                class="size-6 hover:scale-110 transition-all">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>              
            </a>

        </ul>
    </nav>
</header>