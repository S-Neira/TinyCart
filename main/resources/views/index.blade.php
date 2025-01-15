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

    {{-- TODO: Necesito hacer bien la animación, además de hacer un timer para que vayan cambiando las imagenes --}}

    <div 
    x-data="{
        images: ['img/shoes-optimized.webp', 'img/phone-optimized.webp', 'img/bolso-optimized.webp'],
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
            images: ['img/jaquet-optimized.webp', 'img/chica-optimized.webp', 'img/converse-optimized.webp', 'img/hat-optimized.webp'],
            text : {'img/jaquet-optimized.webp' : 'Chaquetas', 'img/chica-optimized.webp' : 'Poleras', 'img/converse-optimized.webp' : 'Calzado', 'img/hat-optimized.webp' : 'Jockeys'},
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
        <div class="border-4 border-transparent hover:border-emerald-400 transition-all duration-300 ease-in-out mt-10 py-5 bg-gray-400 rounded flex flex-col w-[50%] mx-[25%] justify-center">
            <h3 class="font-semibold text-2xl text-center">Contáctame</h3>
            <p class="text-center text-md">Si te gusta mi trabajo, hablemos y veremos como puedo ayudarte.</p>

            <div class="flex gap-2 mt-5 items-center ml-[20%] font-semibold text-lg">
                <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                <svg class="h-[50px] w-auto" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 19H6.2C5.0799 19 4.51984 19 4.09202 18.782C3.71569 18.5903 3.40973 18.2843 3.21799 17.908C3 17.4802 3 16.9201 3 15.8V8.2C3 7.0799 3 6.51984 3.21799 6.09202C3.40973 5.71569 3.71569 5.40973 4.09202 5.21799C4.51984 5 5.0799 5 6.2 5H17.8C18.9201 5 19.4802 5 19.908 5.21799C20.2843 5.40973 20.5903 5.71569 20.782 6.09202C21 6.51984 21 7.0799 21 8.2V10M20.6067 8.26229L15.5499 11.6335C14.2669 12.4888 13.6254 12.9165 12.932 13.0827C12.3192 13.2295 11.6804 13.2295 11.0677 13.0827C10.3743 12.9165 9.73279 12.4888 8.44975 11.6335L3.14746 8.09863M14 21L16.025 20.595C16.2015 20.5597 16.2898 20.542 16.3721 20.5097C16.4452 20.4811 16.5147 20.4439 16.579 20.399C16.6516 20.3484 16.7152 20.2848 16.8426 20.1574L21 16C21.5523 15.4477 21.5523 14.5523 21 14C20.4477 13.4477 19.5523 13.4477 19 14L14.8426 18.1574C14.7152 18.2848 14.6516 18.3484 14.601 18.421C14.5561 18.4853 14.5189 18.5548 14.4903 18.6279C14.458 18.7102 14.4403 18.7985 14.405 18.975L14 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p><a href="mailto:sneira.dev@gmail.com">sneira.dev@gmail.com</a></p>
            </div>
            
            <div class="flex gap-2 mt-5 items-center ml-[20%] font-semibold text-lg">
                <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                <svg class="h-[50px] w-auto" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.5 8C7.32843 8 8 7.32843 8 6.5C8 5.67157 7.32843 5 6.5 5C5.67157 5 5 5.67157 5 6.5C5 7.32843 5.67157 8 6.5 8Z" fill="#0F0F0F"/>
                    <path d="M5 10C5 9.44772 5.44772 9 6 9H7C7.55228 9 8 9.44771 8 10V18C8 18.5523 7.55228 19 7 19H6C5.44772 19 5 18.5523 5 18V10Z" fill="#0F0F0F"/>
                    <path d="M11 19H12C12.5523 19 13 18.5523 13 18V13.5C13 12 16 11 16 13V18.0004C16 18.5527 16.4477 19 17 19H18C18.5523 19 19 18.5523 19 18V12C19 10 17.5 9 15.5 9C13.5 9 13 10.5 13 10.5V10C13 9.44771 12.5523 9 12 9H11C10.4477 9 10 9.44772 10 10V18C10 18.5523 10.4477 19 11 19Z" fill="#0F0F0F"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20 1C21.6569 1 23 2.34315 23 4V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H20ZM20 3C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3H20Z" fill="#0F0F0F"/>
                </svg>
                <p><a href="https://www.linkedin.com/in/sergio-neira-2b2689344/" target="_blank">LinkedIn</a></p>
            </div>

            <div class="flex gap-2 mt-5 items-center ml-[20%] font-semibold text-lg">
                <?xml version="1.0" encoding="UTF-8" standalone="no"?>
                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                <svg  class="h-[50px] w-auto" width="800px" height="800px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    
                    <title>github [#142]</title>
                    <desc>Created with Sketch.</desc>
                    <defs>

                </defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -7559.000000)" fill="#000000">
                            <g id="icons" transform="translate(56.000000, 160.000000)">
                                <path d="M94,7399 C99.523,7399 104,7403.59 104,7409.253 C104,7413.782 101.138,7417.624 97.167,7418.981 C96.66,7419.082 96.48,7418.762 96.48,7418.489 C96.48,7418.151 96.492,7417.047 96.492,7415.675 C96.492,7414.719 96.172,7414.095 95.813,7413.777 C98.04,7413.523 100.38,7412.656 100.38,7408.718 C100.38,7407.598 99.992,7406.684 99.35,7405.966 C99.454,7405.707 99.797,7404.664 99.252,7403.252 C99.252,7403.252 98.414,7402.977 96.505,7404.303 C95.706,7404.076 94.85,7403.962 94,7403.958 C93.15,7403.962 92.295,7404.076 91.497,7404.303 C89.586,7402.977 88.746,7403.252 88.746,7403.252 C88.203,7404.664 88.546,7405.707 88.649,7405.966 C88.01,7406.684 87.619,7407.598 87.619,7408.718 C87.619,7412.646 89.954,7413.526 92.175,7413.785 C91.889,7414.041 91.63,7414.493 91.54,7415.156 C90.97,7415.418 89.522,7415.871 88.63,7414.304 C88.63,7414.304 88.101,7413.319 87.097,7413.247 C87.097,7413.247 86.122,7413.234 87.029,7413.87 C87.029,7413.87 87.684,7414.185 88.139,7415.37 C88.139,7415.37 88.726,7417.2 91.508,7416.58 C91.513,7417.437 91.522,7418.245 91.522,7418.489 C91.522,7418.76 91.338,7419.077 90.839,7418.982 C86.865,7417.627 84,7413.783 84,7409.253 C84,7403.59 88.478,7399 94,7399" id="github-[#142]">

                </path>
                            </g>
                        </g>
                    </g>
                </svg>
                <p><a href="https://github.com/S-Neira/Me">Github</a></p>
            </div>
        </div>

        {{-- Productos --}}

        <div 
        x-data="{
            range: Array.from({ length: 8 }, (_, i) => i + 1),
            title: ['Chaqueta Canguro', 'Parka', 'Casual', 'Office', 'Formal', 'Deportivo', 'Invierno', 'Verano'],
            notification: {
                visible: false,
                timeout: 5000,
                percent: 0,
                timeoutId: null,
                actualProduct: null,
                show() {
                    // Reiniciar la notificación
                    this.visible = true;
    
                    // Si hay un temporizador en ejecución, entonces no hagas nada
                    if (this.timeoutId) return;
    
                    // Reiniciar el progreso
                    this.percent = 0;
    
                    const startDate = Date.now();
                    const futureDate = startDate + this.timeout;
    
                    // Establecer un nuevo temporizador
                    this.timeoutId = setTimeout(() => {
                        this.visible = false;
                        this.timeoutId = null; // Resetear el ID del temporizador
                    }, this.timeout);
    
                    // Actualizar el progreso
                    const interval = setInterval(() => {
                        const date = Date.now();
                        this.percent = ((date - startDate) / (futureDate - startDate)) * 100;
    
                        if (this.percent >= 100) clearInterval(interval);
                    }, 30);

                    // Dejar de mostrar si se completó
                    if(this.percent === 100) this.visible = false;
                },
                
                close(){
                    this.percent = null;
                    this.visible = false;
                },
       
            
            }
        }" 
        class="relative"
    >
            <!-- Productos -->
        <div class="grid grid-cols-4 gap-5 my-5">
                <template x-for="n in range" :key="n">
                    <div class="flex flex-col gap-5 justify-center items-center bg-gray-200 p-5 rounded shadow">
                        <img 
                            :src="`items/product${n}-optimized.webp`" 
                            :alt="'producto: ' + n" 
                            class="w-full h-[250px] object-cover rounded-md"
                        >
                        <h2 x-text="title[n - 1]" class="font-semibold text-lg"></h2>
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="flex gap-5">
                            <button 
                                @click="actualProduct = title[n-1] ; notification.show()" 
                                class="font-semibold w-auto bg-gray-400 text-white rounded-md p-2 hover:bg-gray-500 transition-all
                            >
                                Añadir al Carro
                            </button>
                            <button class="font-semibold w-auto bg-emerald-400 text-white rounded-md p-2 hover:bg-emerald-500 transition-all">
                                Comprar
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        
            <!-- Notificación -->
            <div 
                x-show="notification.visible" 
                x-data="notification" 
                class="fixed top-5 right-5 z-50 py-4 px-6 bg-emerald-600 text-white rounded shadow-lg transition-opacity"
                style="display: none;"
            >
                <div class="font-semibold mb-2">¡Producto añadido al carro!</div>
                <div class="text-sm">Ve al carro para poder finalizar tu compra.</div>
                <button @click="notification.close()" 
                        class="absolute top-2 right-2 w-[30px] h-[30px] rounded-full hover:bg-black/10 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- Progreso -->
                <div class="absolute left-0 bottom-0 right-0 h-[6px] bg-black/10" :style="{'width': `${percent}%`}"></div>
            </div>
        </div>
    
    </main>

    <x-footer></x-footer>    

</body>
</html>
