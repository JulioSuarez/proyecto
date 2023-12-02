<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta id="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>CrediDocuManager</title>
    <link
    href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap"
    rel="stylesheet"
  />

  
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- 'resources/js/modal_navbar.js' -->




</head>


<body class="bg-gray-100">

    @php
        $tema = 'red';
        $link = [
            [
                'name' => 'Dashboard',
                'url' => route('dashboard'),
                'active' => request()->routeIs('dashboard'), //verifica si se esta en la rota atual
                'permiso' => 'nav.dashboard',
                'icono' => 'fa-solid fa-house',
            ],
            [
                'name' => 'Stream',
                'url' => route('stream.en_vivo'),
                'active' => request()->routeIs('stream.*'), //verifica si se esta en la rota atual
                'permiso' => 'nav.stream_en_vivo',
                'icono' => 'fa-solid fa-video',
            ],

        ];
    @endphp

    <div
        class="flex bg-white justify-between items-center space-x-5 pl-4 fixed top-0 z-50 h-14 w-full border-b border-gray-300 shadow">
        <div class=" text-base h-full flex justify-between items-center w-96 ">  
            <button id="bt_abrir_menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
            </button>


            {{-- <img  class="object-cover h-24 "   src="{{ asset('images/logo_loky.png')}}" alt="Logo de mi aplicación"> --}}
            {{-- <img class="object-cover h-14 " src="https://upload.wikimedia.org/wikipedia/commons/2/24/LEGO_logo.svg" alt="Logo de mi aplicación"> --}}
        </div>

        {{-- titulo del medio  --}}
        <div class="flex w-full ">
            {{-- <div class="w-1/2">

                <form>
                    <div class="flex">
                        <label for="search-dropdown"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                        <button id="dropdown-button" data-dropdown-toggle="dropdown"
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                            type="button">All categories <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                                </li>
                            </ul>
                        </div>
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Search Mockups, Logos, Design Templates..." required>
                            <button type="submit"
                                class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>


            </div> --}}
            <div class="flex-1 flex space-x-4 justify-center ">
                <p class="text-gray-700 text-base  font-medium uppercase font-mono">
                    {{ $titulo ?? '' }}
                </p>
                {{-- <span class="text-base"> subtitulo </span> --}}
            </div>
        </div>

        {{-- seeders --}}
        <div class="">
            {{-- <button > <!--id="bt_config_abrir"-->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-8 h-8 text-gray-700">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button> --}}
            {{-- <a href="{{ route('ejecutar_seeder') }}"  class="btn-green">
                Seeders
            </a> --}}

        </div>

        {{-- modal de perfil de usuario --}}
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex  items-center px-3 w-48   border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 gray-300 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        @php
                            $user = Auth::user();
                        @endphp

                        <div class="mr-2 ">
                            @if ($user->foto)
                                <img class="w-12 h-10 rounded-full object-cover"
                                    src="{{ route('cargar_imagen', $user->foto) }}" />
                            @else
                            <img class="w-12 h-10 rounded-lg object-cover"
                                src="https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg"
                                alt="">
                            @endif
                        </div>
                        <div class="">
                            <p class="whitespace-nowrap"> {{ $user->name }}</p>
                            {{-- <p> {{ $user->roles[0]->name }}</p> --}}
                        </div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    {{-- <x-dropdown-link :href="route('perfilEmpresa')">
                        Banco Economico
                    </x-dropdown-link> --}}

                    <x-dropdown-link :href="route('profile.edit')">
                        Perfil de usuario 
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>

                </x-slot>
            </x-dropdown>
        </div>


    </div>


    {{-- div de abajo  --}}
    <div class="pt-14 flex h-screen ">
        {{-- barra lateral de la izquierda  w-64 --}}
        {{-- laso ixquierdo --}}
        <div id="div_navbar1" class="bg-gray-100 fixed  text-gray-600 w-nav-chico  overflow-y-auto h-[91%] shadow-lg ">
            <div class=" flex flex-col space-y-2 justify-between  h-full   ">
                <div class="py-3 mr-4 space-y-1  ">
                    @foreach ($link as $l)
                        @php
                            $active = $l['active'];
                            $classes = $active ?? false ? ' border-l-4 border-green-500 bg-gray-200 pl-3  text-green-600 font-bold'
                                                        : ' bg-gray-100 hover:bg-white pl-4  text-gray-600';
                        @endphp
                        {{-- @can($l['permiso']) --}}
                        @if ($l['name'] == 'Productos' && $l['active'])
                            <div class="div_mostrar_producto flex flex-col  ">
                                <button {{ $l['name'] == 'Productos' && $l['active'] ? 'id=bt_producto' : '' }}
                                    type="button"  class="flex justify-between w-full px-4
                                        {{ $classes }} flex items-center text-sm font-medium pt-1 pr-2  text-gray-600
                                        hover:text-base rounded-tr-lg transition duration-150 ease-in-out "
                                >
                                <div class="">
                                    <i class="{{ $l['icono'] }}  w-5 text-center "></i>
                                    <span class="text-base ml-2">{{ $l['name'] }}</span>
                                </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4 opacity-80">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>  
                                </button>

                                <ul id="ul_productos" class=" hidden border-l-4 border-green-500 bg-gray-200 pl-14 text-gray-700 space-y-1 py-1 pr-2">
                                    <li >
                                        <a class="{{ request()->routeIs('producto.index.datatable') ? 'text-green-600 font-medium' : '' }}"
                                        href="{{ route('producto.index.datatable') }}">Productos Original</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->routeIs('producto.index') ? 'text-green-800 font-medium' : '' }}"
                                        href="{{ route('producto.index') }}">Productos DataTable</a>
                                    </li>
                                </ul>
                                                        
                            </div>
                        @else    
                            <a class="{{ $classes }} flex items-center text-sm font-medium py-1 pr-2  text-gray-600
                                hover:text-base rounded-r-lg  "
                                href="{{ $l['url'] }}"
                                {{-- {{ $l['name'] == 'Productos' ? 'id=bt_producto' : '' }} --}}
                                >
                              
                                <i class="{{ $l['icono'] }} text-center w-6 mr-2 "></i>
                                <div class="min-h-[1.5rem]">
                                    <span class="text-base text-center  navbar_nombre  ">
                                        {{  $l['name']  }}
                                    </span>
                                </div>
                            </a>    
                        @endif

                        {{-- @endcan --}}
                    @endforeach

                </div>
            </div> <!-- termina la barra lateral inzquierda-->
        </div>

        <div id="div_navbar2" class="w-nav-chico">
            
        </div>
        {{-- parte derecha --}}
        <div id="div_contenido" class=" w-[82%] ">
            <!-- ml-64-->
            <div class=" h-full  ">
                {{ $slot }}

            </div>

        </div>

    </div>
 
</body>

</html>
