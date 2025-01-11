<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TinyCart | Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="mx-10 bg-gray-300">
    <x-header></x-header>

    {{-- Carousel --}}

    TODO: Necesito hacer bien la animación, además de hacer un timer para que vayan cambiando las imagenes

    <div 
    x-data="{
        images: ['img/shoes.jpg', 'img/phone.jpg', 'img/bolso.jpg'],
        activeImage : null,
        prev(){
            let index = this.images.indexOf(this.activeImage);
            if(index === 0) index = this.images.length;
            this.activeImage = this.images[index - 1]; 
        },
        next(){
            let index = this.images.indexOf(this.activeImage);
            if(index === this.images.length - 1) index = -1;
            this.activeImage = this.images[index + 1]; 
        },
        init(){
            this.activeImage = this.images.length > 0 ? this.images[0] : null
        }
    }"
    class="rounded-md flex gap-5 justify-center items-center bg-black/10 border-b-[10px] border-emerald-400"
    >

       <a href="" @click.prevent="prev">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
            class="size-10 hover:scale-110 transition-all cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </a>    
 
        <template x-for="img in images">
            <img x-transition x-show="activeImage === img" class="max-w-[50%]" :src="img" alt="Carousel">
        </template>

        <a href="" @click.prevent="next" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
            class="size-10 hover:scale-110 transition-all cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </a>
    

    </div>

    <main>
        <h1 class="text-center font-semibold text-2xl my-10">Revisa Nuestros Productos</h1>

        {{-- Catalogo --}}

        <div
        x-data="{
            images: ['img/jaquet.jpg', 'img/chica.jpg', 'img/converse.jpg', 'img/hat.jpg'],
            text : {'img/jaquet.jpg' : 'Chaquetas', 'img/chica.jpg' : 'Poleras', 'img/converse.jpg' : 'Calzado', 'img/hat.jpg' : 'Jockeys'},
            index : 0
        }"
        class="flex justify-center gap-5"
        >
            <template x-for="image in images">
                <div x-data="{visible:false}"
                class="relative hover:scale-105 transition-all cursor-pointer"
                @mouseover="visible = true"
                @mouseleave="visible = false"
                :class="{'bg-black/10 transition-all' : visible}"
                >
                    <img 
                    class="w-full h-[500px]" :src="image" :key="image" alt="'imagen:' + image"
                    :class="{'brightness-50 transition-all' : visible}" 
                    >
                    <h2
                    x-text="text[image]"
                    x-transition
                    x-show="visible" 
                    class="absolute inset-0 text-white font-bold text-3xl top-[50%] left-0 text-center"
                    ></h2>
                </div>
            </template>
        </div>

        {{-- Informacion --}}

        {{-- Aquí estaría bueno poner algo como  mi contacto como desarrollador y otras cosas que pueden ser intersantes. --}}

        {{-- Productos --}}
        <div 
            x-data="{ range: Array.from({ length: 4 }, (_, i) => i + 1) }" 
            class="flex gap-5 my-5"
        >
            <template x-for="n in range" :key="n">
                <img 
                    :src="`items/product${n}.jpg`" 
                    :alt="'producto: ' + n" 
                    class="w-full h-[250px] object-cover"
                >
            </template>
        </div>


    </main>

    <x-footer></x-footer>    

</body>
</html>
