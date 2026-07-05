<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mi Perfil - Emprendedor</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-50:oklch(.971 .013 17.38);--color-red-100:oklch(.936 .032 17.717);--color-red-200:oklch(.885 .062 18.334);--color-red-300:oklch(.808 .114 19.571);--color-red-400:oklch(.704 .191 22.216);--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518);--color-red-800:oklch(.444 .177 26.899);--color-red-900:oklch(.396 .141 25.723);--color-red-950:oklch(.258 .092 26.042);--color-orange-50:oklch(.98 .016 73.684);--color-orange-100:oklch(.954 .038 75.164);--color-orange-200:oklch(.901 .076 70.697);--color-orange-300:oklch(.837 .128 66.29);--color-orange-400:oklch(.75 .183 55.934);--color-orange-500:oklch(.705 .213 47.604);--color-orange-600:oklch(.646 .222 41.116);--color-orange-700:oklch(.553 .195 38.402);--color-orange-800:oklch(.47 .157 37.304);--color-orange-900:oklch(.408 .123 38.172);--color-orange-950:oklch(.266 .079 36.259);--color-amber-50:oklch(.987 .022 95.277);--color-amber-100:oklch(.962 .059 95.617);--color-amber-200:oklch(.924 .12 95.746);--color-amber-300:oklch(.879 .169 91.605);--color-amber-400:oklch(.828 .189 84.429);--color-amber-500:oklch(.769 .188 70.08);--color-amber-600:oklch(.666 .179 58.318);--color-amber-700:oklch(.555 .163 48.998);--color-amber-800:oklch(.473 .137 46.201);--color-amber-900:oklch(.414 .112 45.904);--color-amber-950:oklch(.279 .077 45.635);--color-yellow-50:oklch(.987 .026 102.212);--color-yellow-100:oklch(.973 .071 103.193);--color-yellow-200:oklch(.945 .129 101.54);--color-yellow-300:oklch(.905 .182 98.111);--color-yellow-400:oklch(.852 .199 91.936);--color-yellow-500:oklch(.795 .196 83.72);--color-yellow-600:oklch(.681 .179 72.398);--color-yellow-700:oklch(.553 .163 63.314);--color-yellow-800:oklch(.473 .137 56.299);--color-yellow-900:oklch(.414 .112 52.496);--color-yellow-950:oklch(.279 .077 49.624);--color-lime-50:oklch(.987 .016 124.326);--color-lime-100:oklch(.961 .044 125.943);--color-lime-200:oklch(.923 .083 126.695);--color-lime-300:oklch(.877 .128 126.714);--color-lime-400:oklch(.815 .166 126.199);--color-lime-500:oklch(.747 .178 126.695);--color-lime-600:oklch(.638 .172 128.6);--color-lime-700:oklch(.517 .157 132.549);--color-lime-800:oklch(.424 .133 136.978);--color-lime-900:oklch(.363 .112 141.137);--color-lime-950:oklch(.246 .075 142.495);--color-green-50:oklch(.982 .018 154.549);--color-green-100:oklch(.951 .045 155.842);--color-green-200:oklch(.904 .088 156.739);--color-green-300:oklch(.841 .134 157.428);--color-green-400:oklch(.762 .172 158.112);--color-green-500:oklch(.673 .192 159.078);--color-green-600:oklch(.552 .176 162.449);--color-green-700:oklch(.452 .154 168.112);--color-green-800:oklch(.376 .133 174.514);--color-green-900:oklch(.329 .112 179.509);--color-green-950:oklch(.218 .073 182.825);--color-emerald-50:oklch(.982 .018 177.419);--color-emerald-100:oklch(.951 .045 178.712);--color-emerald-200:oklch(.904 .088 179.609);--color-emerald-300:oklch(.841 .134 180.298);--color-emerald-400:oklch(.762 .172 180.982);--color-emerald-500:oklch(.673 .192 181.948);--color-emerald-600:oklch(.552 .176 185.319);--color-emerald-700:oklch(.452 .154 190.982);--color-emerald-800:oklch(.376 .133 197.384);--color-emerald-900:oklch(.329 .112 202.379);--color-emerald-950:oklch(.218 .073 205.695);--color-teal-50:oklch(.982 .018 180.726);--color-teal-100:oklch(.951 .045 182.019);--color-teal-200:oklch(.904 .088 182.916);--color-teal-300:oklch(.841 .134 183.605);--color-teal-400:oklch(.762 .172 184.289);--color-teal-500:oklch(.673 .192 185.255);--color-teal-600:oklch(.552 .176 188.626);--color-teal-700:oklch(.452 .154 194.289);--color-teal-800:oklch(.376 .133 200.691);--color-teal-900:oklch(.329 .112 205.686);--color-teal-950:oklch(.218 .073 209.002);--color-cyan-50:oklch(.982 .018 188.416);--color-cyan-100:oklch(.951 .045 189.709);--color-cyan-200:oklch(.904 .088 190.606);--color-cyan-300:oklch(.841 .134 191.295);--color-cyan-400:oklch(.762 .172 191.979);--color-cyan-500:oklch(.673 .192 192.945);--color-cyan-600:oklch(.552 .176 196.316);--color-cyan-700:oklch(.452 .154 201.979);--color-cyan-800:oklch(.376 .133 208.381);--color-cyan-900:oklch(.329 .112 213.376);--color-cyan-950:oklch(.218 .073 216.692);--color-sky-50:oklch(.982 .018 200.865);--color-sky-100:oklch(.951 .045 202.158);--color-sky-200:oklch(.904 .088 203.055);--color-sky-300:oklch(.841 .134 203.744);--color-sky-400:oklch(.762 .172 204.428);--color-sky-500:oklch(.673 .192 205.394);--color-sky-600:oklch(.552 .176 208.765);--color-sky-700:oklch(.452 .154 214.428);--color-sky-800:oklch(.376 .133 220.83);--color-sky-900:oklch(.329 .112 225.825);--color-sky-950:oklch(.218 .073 229.141);--color-blue-50:oklch(.982 .018 238.744);--color-blue-100:oklch(.951 .045 240.037);--color-blue-200:oklch(.904 .088 240.934);--color-blue-300:oklch(.841 .134 241.623);--color-blue-400:oklch(.762 .172 242.307);--color-blue-500:oklch(.673 .192 243.273);--color-blue-600:oklch(.552 .176 246.644);--color-blue-700:oklch(.452 .154 252.307);--color-blue-800:oklch(.376 .133 258.709);--color-blue-900:oklch(.329 .112 263.704);--color-blue-950:oklch(.218 .073 267.02);--color-indigo-50:oklch(.982 .018 252.864);--color-indigo-100:oklch(.951 .045 254.157);--color-indigo-200:oklch(.904 .088 255.054);--color-indigo-300:oklch(.841 .134 255.743);--color-indigo-400:oklch(.762 .172 256.427);--color-indigo-500:oklch(.673 .192 257.393);--color-indigo-600:oklch(.552 .176 260.764);--color-indigo-700:oklch(.452 .154 266.427);--color-indigo-800:oklch(.376 .133 272.829);--color-indigo-900:oklch(.329 .112 277.824);--color-indigo-950:oklch(.218 .073 281.14);--color-violet-50:oklch(.982 .018 276.944);--color-violet-100:oklch(.951 .045 278.237);--color-violet-200:oklch(.904 .088 279.134);--color-violet-300:oklch(.841 .134 279.823);--color-violet-400:oklch(.762 .172 280.507);--color-violet-500:oklch(.673 .192 281.473);--color-violet-600:oklch(.552 .176 284.844);--color-violet-700:oklch(.452 .154 290.507);--color-violet-800:oklch(.376 .133 296.909);--color-violet-900:oklch(.329 .112 301.904);--color-violet-950:oklch(.218 .073 305.22);--color-purple-50:oklch(.982 .018 293.713);--color-purple-100:oklch(.951 .045 295.006);--color-purple-200:oklch(.904 .088 295.903);--color-purple-300:oklch(.841 .134 296.592);--color-purple-400:oklch(.762 .172 297.276);--color-purple-500:oklch(.673 .192 298.242);--color-purple-600:oklch(.552 .176 301.613);--color-purple-700:oklch(.452 .154 307.276);--color-purple-800:oklch(.376 .133 313.678);--color-purple-900:oklch(.329 .112 318.673);--color-purple-950:oklch(.218 .073 321.989);--color-fuchsia-50:oklch(.982 .018 318.693);--color-fuchsia-100:oklch(.951 .045 319.986);--color-fuchsia-200:oklch(.904 .088 320.883);--color-fuchsia-300:oklch(.841 .134 321.572);--color-fuchsia-400:oklch(.762 .172 322.256);--color-fuchsia-500:oklch(.673 .192 323.222);--color-fuchsia-600:oklch(.552 .176 326.593);--color-fuchsia-700:oklch(.452 .154 332.256);--color-fuchsia-800:oklch(.376 .133 338.658);--color-fuchsia-900:oklch(.329 .112 343.653);--color-fuchsia-950:oklch(.218 .073 346.969);--color-pink-50:oklch(.982 .018 338.732);--color-pink-100:oklch(.951 .045 340.025);--color-pink-200:oklch(.904 .088 340.922);--color-pink-300:oklch(.841 .134 341.611);--color-pink-400:oklch(.762 .172 342.295);--color-pink-500:oklch(.673 .192 343.261);--color-pink-600:oklch(.552 .176 346.632);--color-pink-700:oklch(.452 .154 352.295);--color-pink-800:oklch(.376 .133 358.697);--color-pink-900:oklch(.329 .112 363.692);--color-pink-950:oklch(.218 .073 367.008);--color-rose-50:oklch(.982 .018 353.929);--color-rose-100:oklch(.951 .045 355.222);--color-rose-200:oklch(.904 .088 356.119);--color-rose-300:oklch(.841 .134 356.808);--color-rose-400:oklch(.762 .172 357.492);--color-rose-500:oklch(.673 .192 358.458);--color-rose-600:oklch(.552 .176 361.829);--color-rose-700:oklch(.452 .154 367.492);--color-rose-800:oklch(.376 .133 373.894);--color-rose-900:oklch(.329 .112 378.889);--color-rose-950:oklch(.218 .073 382.205);--color-slate-50:oklch(.986 .002 264.345);--color-slate-100:oklch(.969 .006 264.525);--color-slate-200:oklch(.939 .015 265.648);--color-slate-300:oklch(.896 .027 266.784);--color-slate-400:oklch(.839 .044 267.935);--color-slate-500:oklch(.768 .063 269.694);--color-slate-600:oklch(.655 .083 274.038);--color-slate-700:oklch(.536 .107 279.236);--color-slate-800:oklch(.448 .131 285.886);--color-slate-900:oklch(.393 .15 292.716);--color-slate-950:oklch(.272 .096 302.314);--color-gray-50:oklch(.985 .002 264.345);--color-gray-100:oklch(.967 .006 264.345);--color-gray-200:oklch(.937 .015 264.345);--color-gray-300:oklch(.894 .028 264.345);--color-gray-400:oklch(.837 .045 264.345);--color-gray-500:oklch(.765 .063 264.345);--color-gray-600:oklch(.652 .083 264.345);--color-gray-700:oklch(.532 .107 264.345);--color-gray-800:oklch(.445 .131 264.345);--color-gray-900:oklch(.39 .15 264.345);--color-gray-950:oklch(.268 .096 264.345);--color-zinc-50:oklch(.985 .002 264.345);--color-zinc-100:oklch(.967 .006 264.345);--color-zinc-200:oklch(.937 .015 264.345);--color-zinc-300:oklch(.894 .028 264.345);--color-zinc-400:oklch(.837 .045 264.345);--color-zinc-500:oklch(.765 .063 264.345);--color-zinc-600:oklch(.652 .083 264.345);--color-zinc-700:oklch(.532 .107 264.345);--color-zinc-800:oklch(.445 .131 264.345);--color-zinc-900:oklch(.39 .15 264.345);--color-zinc-950:oklch(.268 .096 264.345);--color-neutral-50:oklch(.985 .002 264.345);--color-neutral-100:oklch(.967 .006 264.345);--color-neutral-200:oklch(.937 .015 264.345);--color-neutral-300:oklch(.894 .028 264.345);--color-neutral-400:oklch(.837 .045 264.345);--color-neutral-500:oklch(.765 .063 264.345);--color-neutral-600:oklch(.652 .083 264.345);--color-neutral-700:oklch(.532 .107 264.345);--color-neutral-800:oklch(.445 .131 264.345);--color-neutral-900:oklch(.39 .15 264.345);--color-neutral-950:oklch(.268 .096 264.345);--color-stone-50:oklch(.986 .002 60.185);--color-stone-100:oklch(.969 .006 60.185);--color-stone-200:oklch(.939 .015 60.185);--color-stone-300:oklch(.896 .028 60.185);--color-stone-400:oklch(.839 .045 60.185);--color-stone-500:oklch(.768 .063 60.185);--color-stone-600:oklch(.655 .083 60.185);--color-stone-700:oklch(.536 .107 60.185);--color-stone-800:oklch(.448 .131 60.185);--color-stone-900:oklch(.393 .15 60.185);--color-stone-950:oklch(.272 .096 60.185);--color-white:oklch(1 0 0);--color-black:oklch(0 0 0)}@layer base{*,*::before,*::after{box-sizing:border-box;border-width:0;border-style:solid;border-color:rgb(var(--color-gray-200)/1)}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:var(--font-sans,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");font-feature-settings:normal;font-variation-settings:normal}body{margin:0;line-height:inherit}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--font-mono,ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace);font-feature-settings:normal;font-variation-settings:normal}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}h1,h2,h3,h4,h5,h6,ul,ol,dl,dd{margin:0}ul,ol{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{display:block;vertical-align:middle}button,input{background:none}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:rgb(var(--color-gray-400)/1)}button,[role=button]{cursor:pointer}:disabled{cursor:default}img,video{max-width:100%;height:auto}}@layer utilities{.container{width:100%;margin-right:auto;margin-left:auto;padding-right:1rem;padding-left:1rem}@media(min-width:640px){.container{max-width:640px}}@media(min-width:768px){.container{max-width:768px}}@media(min-width:1024px){.container{max-width:1024px}}@media(min-width:1280px){.container{max-width:1280px}}@media(min-width:1536px){.container{max-width:1536px}}}
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen">
        <div class="container mx-auto p-6 lg:p-8">
            <!-- Header -->
            <header class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold">Mi Perfil - Emprendedor</h1>
                <nav class="flex gap-4">
                    <a href="{{ url('/') }}" class="px-4 py-2 border border-[#19140035] hover:border-[#1915014a] rounded-sm text-sm">Inicio</a>
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 border border-[#19140035] hover:border-[#1915014a] rounded-sm text-sm">Cerrar Sesión</button>
                        </form>
                    @endauth
                </nav>
            </header>

            <!-- Profile Info -->
            <div class="bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-6 mb-8">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                        {{ auth()->user()->name ? substr(auth()->user()->name, 0, 1) : 'E' }}
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold">{{ auth()->user()->name ?? 'Emprendedor' }}</h2>
                        <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ auth()->user()->email ?? '' }}</p>
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-1">Emprendedor verificado</p>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Nueva Publicación -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-6 sticky top-8">
                        <h3 class="text-lg font-semibold mb-4">Nueva Publicación</h3>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Título del producto</label>
                                <input type="text" placeholder="Ej: Camiseta personalizada" class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-[#FDFDFC] dark:bg-[#0a0a0a] focus:outline-none focus:border-[#f53003]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Descripción</label>
                                <textarea rows="4" placeholder="Describe tu producto..." class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-[#FDFDFC] dark:bg-[#0a0a0a] focus:outline-none focus:border-[#f53003]"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Precio</label>
                                <input type="number" placeholder="0.00" class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-[#FDFDFC] dark:bg-[#0a0a0a] focus:outline-none focus:border-[#f53003]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Imagen</label>
                                <input type="file" class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-[#FDFDFC] dark:bg-[#0a0a0a]">
                            </div>
                            <button type="submit" class="w-full bg-[#f53003] hover:bg-[#d92800] text-white py-2 rounded-sm font-medium transition-colors">
                                Publicar Producto
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Mis Publicaciones -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-4">Mis Publicaciones</h3>
                        
                        <!-- Ejemplo de publicación -->
                        <div class="border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg p-4 mb-4">
                            <div class="flex gap-4">
                                <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900 dark:to-blue-800 rounded-lg flex items-center justify-center">
                                    <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold mb-1">Producto de ejemplo</h4>
                                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-2">Descripción breve del producto que estás promocionando...</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-[#f53003]">$25.00</span>
                                        <div class="flex gap-2">
                                            <button class="px-3 py-1 text-sm border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm hover:bg-[#FDFDFC] dark:hover:bg-[#0a0a0a]">Editar</button>
                                            <button class="px-3 py-1 text-sm border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm hover:bg-[#FDFDFC] dark:hover:bg-[#0a0a0a] text-red-500">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Estado vacío -->
                        <div class="text-center py-12 text-[#706f6c] dark:text-[#A1A09A]">
                            <svg class="w-16 h-16 mx-auto mb-4 text-[#706f6c] dark:text-[#A1A09A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <p class="text-lg font-medium">No tienes publicaciones aún</p>
                            <p class="text-sm mt-1">Comienza promocionando tus productos usando el formulario de la izquierda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
