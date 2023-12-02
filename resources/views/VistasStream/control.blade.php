<x-navbar-inquilinos>

    @vite(['resources/js/streamjs/ia_mover_cara.js'])


    <x-slot name='titulo'>
        IA Mover Cara xd
    </x-slot>
    <div class=" p-8 h-full ">

        <div class="flex bg-white rounded-lg h-full p-7">
            <div class="flex flex-col justify-end space-y-2 overflow-y-auto  w-full border-r-2 pr-2 border-gray-500">
                <div class="flex justify-around flex-1 p-5 ">
                    <button class="h-52   w-40" id="bt_hombre" type="button">
                        <img id="img_hombre" src="{{ asset('/images/hombre_perfil.png') }}" alt="no se cargo"
                            class="h-full object-cover border-2 border-blue-600 shadow  rounded-lg ">
                        <p class="text-center font-semibold"> hombre</p>
                    </button>
                    <button class="h-52 w-40" id="bt_mujer" type="button">
                        <img id="img_mujer" src="{{ asset('/images/mujer_perfil.png') }}" alt="no se cargo"
                            class="h-full object-cover border-2  shadow shadow-blue-600 rounded-lg ">
                        <p class="text-center font-semibold"> mujer</p>
                    </button>
                </div>

                <div class="flex">
                    <button class="btn-red">enojado </button>
                    <button class="btn-red">feliz </button>
                    <button class="btn-red">enojado </button>
                    <button class="btn-red">enojado </button>
                </div>

                <div class="flex flex-col   font-semibold">
                    <label for="foto">Cargar imagen</label>
                    <input type="file" name="foto" id="foto">
                </div>

                <div class=" ">
                    <p class="mb-1 font-semibold">Mensaje a reproducir</p>
                   <div class="flex">
                    <input id="ip_mensaje" type="text" value="" name="texto" placeholder="escribir"
                    class="rounded-lg w-[80%]">
                <button id="butom_ia" type="button"
                    class="rounded-lg p-2 ml-3 bg-black text-white font-semibold uppercase">
                    enviar
                </button>
                   </div>
                </div>

                
            </div>
            <div class=" w-full flex flex-col justify-between pl-6  ">
                <div class="bg-gray-800 text-white p-5">
                    <p>Centro de contrl </p>
                    <div class="flex space-x-5 overflow-x-auto ">
                        <button id="video_1">
                            <img class="h-28 w-28" src="{{ asset('/images/video.png') }}" alt="">
                        </button>

                        <button id="video_2">
                            <img class="h-28 w-28" src="{{ asset('/images/video.png') }}" alt="">
                        </button>

                        <button id="video_3">
                            <img class="h-28 w-28" src="{{ asset('/images/video.png') }}" alt="">
                        </button>

                        {{-- <button>
                            <img class="h-28 w-28" src="{{ asset('/images/video.png') }}" alt="">
                        </button>

                        <button>
                            <img class="h-28 w-28" src="{{ asset('/images/video.png') }}" alt="">
                        </button>

                        <button>
                            <img class="h-28 w-28" src="{{ asset('/images/video.png') }}" alt="">
                        </button> --}}
          
                    
                    </div>

                    
                </div>

                <div class="mb-7 flex justify-center">
                    <p class="text-black font-bold text-lg  text-center">
                        IA Video
                    </p>
                    <button id=" bt_mostrar_video" class=" btn-green disabled">

                    </button>
                </div>

                <video id="ia_video2" controls class="hidden bg-black rounded-md border h-80 object-cover">
                    <!--object-cover -->
                    <source src="{{ asset('/videos/video_prueba.mp4') }}" type="video/mp4">
                    Tu navegador no soporta videos
                </video>

               



                 
                <video id="ia_video" controls autoplay loop class=" rounded-md border h-80 object-cover">
                    <source id="video_src" src=""  type="video/mp4">
                    Tu navegador no soporta videos
                </video>
                



                <div id="xdxd" class="hidden h-64 flex bg-gray-100 justify-center items-center rounded-lg ">
                    <p> no hay video que reproducir</p>

                </div>

                <div class="flex justify-around mt-4">
                    <button id="bt_play">
                        play
                    </button>
                    <button id="bt_pause">
                        pause
                    </button>
                </div>


            </div>
        </div>

    

    </div>
</x-navbar-inquilinos>
