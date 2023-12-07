<x-app-layout>

    @vite([
        // 'resources/js/business/news_eventos.js',
        'resources/js/business/centro_control.js',
        'resources/js/business/ia_mover_cara.js',
    ])

    {{-- @dd($program->news) --}}
    <div class=" px-16 pt-4   ">
        <div class="flex bg-white rounded-lg h-full py-3 px-6">

            {{-- parte izquierda --}}
            <div class= "w-[45%] flex flex-col overflow-y-auto  border-r-2 pr-2 border-gray-500">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
                    {{ __($program->title) }}
                </h2>
                <div class="flex space-x-6 ">
                    {{-- Seleccionar Avartar --}}
                    <div class=" w-44 space-y-2  ">
                        <x-modal-flow id_modal="bt_abrir_modal">
                            <x-slot name="header">
                                <h2
                                    class="font-semibold text-xl w-full text-center  text-gray-800 leading-tight uppercase">
                                    {{ __('Select Avatar') }}
                                </h2>
                            </x-slot>

                            <x-slot name="body">
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-5">
                                    @foreach ($avatars as $indice => $a)
                                        <div>
                                            <input type="radio" id="avatar{{ $a->id }}" name="avatar"
                                                class="hidden peer" required="" value="{{ $a->id }}">
                                            <label for="avatar{{ $a->id }}"
                                                class="inline-flex items-center justify-between text-gray-500 bg-white border-4 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">

                                                <div class="">
                                                    <img id="img_avatar{{ $indice }}"
                                                        class="h-40 w-36 rounded-md  object-cover "
                                                        src="{{ $a->route_path }}" alt="">

                                                </div>
                                            </label>


                                        </div>
                                    @endforeach
                                </div>

                            </x-slot>

                        </x-modal-flow>

                        <x-button-modal-flow id_modal="bt_abrir_modal" class="bg-gray-900 w-full flex space-x-2">
                            <span> {{ __('Select Avatar') }} </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                            </svg>

                        </x-button-modal-flow>





                        <div class="h-56 w-44">
                            <img id="foto_seleccionada" src="{{ asset('/images/perfil/default.jpg') }}"
                                alt="no se cargo"
                                class="h-full object-cover border-2 border-gray-700 shadow shadow-gray-600 rounded-lg ">
                            {{-- <p class="text-center font-semibold"> mujer</p> --}}
                        </div>

                    </div>

                    {{-- Emociones --}}
                    <div class="">
                        <h3 class="  py-4 font-semibold text-xl text-gray-800 leading-tight uppercase">
                            {{ __('Emotions') }}
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <input type="radio" id="ip_neutral" name="animacion" class="hidden peer"
                                    required="" value="neutral" checked>
                                <label for="ip_neutral"
                                    class="inline-flex items-center  w-full py-2 px-8  text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="flex space-x-2">
                                        <img src="{{ asset('/images/emojis/neutro.png') }}" alt=""
                                            class="w-7 h-7 ">
                                        <div class="w-full text-lg font-semibold">{{ __('Neutral') }}</div>
                                    </div>
                                </label>
                            </li>

                            <li>
                                <input type="radio" id="ip_happy" name="animacion" class="hidden peer" required=""
                                    value="happy">
                                <label for="ip_happy"
                                    class="inline-flex items-center  w-full py-2 px-8 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="flex space-x-2">
                                        <img src="{{ asset('/images/emojis/feliz.png') }}" alt=""
                                            class="w-7 h-7 ">
                                        <div class="w-full text-lg font-semibold">{{ __('Happy') }}</div>
                                    </div>
                                </label>
                            </li>

                            <li>
                                <input type="radio" id="ip_surprise" name="animacion" class="hidden peer"
                                    required="" value="surprise">
                                <label for="ip_surprise"
                                    class="inline-flex items-center w-full py-2 px-8 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="flex space-x-2">
                                        <img src="{{ asset('/images/emojis/sorprendido.png') }}" alt=""
                                            class="w-7 h-7 ">
                                        <div class="w-full text-lg font-semibold">{{ __('Surprise') }}</div>
                                    </div>
                                </label>
                            </li>

                            <li>
                                <input type="radio" id="ip_serious" name="animacion" class="hidden peer"
                                    required="" value="serious">
                                <label for="ip_serious"
                                    class="inline-flex items-center w-full py-2 px-8 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="flex space-x-2">
                                        <img src="{{ asset('/images/emojis/serio.png') }}" alt=""
                                            class="w-7 h-7   ">
                                        <div class="w-full text-lg font-semibold">{{ __('Serious') }}</div>
                                    </div>
                                </label>
                            </li>


                        </ul>

                    </div>

                    {{-- Voces --}}
                    <div class="">
                        <h3 class=" px-3 py-4 font-semibold text-xl text-gray-800 leading-tight uppercase">
                            {{ __('Voices') }}
                        </h3>
                        <ul class=" w-full space-y-3  px-3   ">
                            <li>
                                <input type="radio" id="ip_male" name="voces" class="hidden peer" required=""
                                    value="1" checked>
                                <label for="ip_male"
                                    class="inline-flex items-center justify-between w-full p-2 px-8 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="flex space-x-2 h-7">
                                        <img src="{{ asset('/images/emojis/hombre.png') }}" alt=""
                                            class="w-8 h-8 object-cover">
                                        <div class="w-full text-lg font-semibold">{{ __('Male') }}</div>
                                    </div>
                                </label>
                            </li>

                            <li>
                                <input type="radio" id="ip_female" name="voces" class="hidden peer"
                                    required="" value="0">
                                <label for="ip_female"
                                    class="inline-flex items-center justify-between w-full p-2 px-8 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="flex space-x-2 h-7">
                                        <img src="{{ asset('/images/emojis/mujer.png') }}" alt=""
                                            class="w-8 h-8 object-cover ">
                                        <div class="w-full text-lg font-semibold">{{ __('Female ') }}</div>
                                    </div>
                                </label>
                            </li>




                        </ul>

                    </div>


                </div>

                {{-- Envair mensaje --}}
                <div class=" mt-3 w-full pr-5">
                    <p class="mb-1 font-semibold"> {{ __('Message to play') }} </p>
                    <textarea id="ip_mensaje" name="texto" id="" rows="7"
                        placeholder="{{ __('Write the text here...') }}" class="rounded-lg w-full"></textarea>


                    <div class="flex-1 flex flex-row-reverse justify-between ">
                        <button id="butom_ia" type="button"
                            class="rounded-lg py-2 px-3 ml-3 bg-black text-white font-semibold ">
                            {{ __('Send') }}
                        </button>

                        <p id="ip_error" class="text-red-500 font-semibold">

                        </p>
                    </div>
                </div>


            </div>


            {{-- parte derecha --}}
            <div class="w-[55%] flex flex-col justify-between pl-6">

                <div class="flex flex-col">
                    <h2 class="font-semibold text-xl mb-1 text-gray-800 leading-tight uppercase">
                        {{ __('Control Panel') }}
                    </h2>
                    <div class=" text-white relative ">
                        <img src="{{ asset('/images/cinta.png') }}" alt=""
                            class="top-0 absolute w-full object-fill h-40 bg-white ">
                        <div id="div_control_videos" class="flex pt-8 pl-2 space-x-5 overflow-x-auto ">


                            {{-- <div id="div0" class="relative p-0.5">
                              
                                <dialog id="modal0" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                                    <button id="bt_cerrar0" type="button"
                                        class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                                        X
                                    </button>
    
                                    <div class="border-b border-gray-400 p-3 text-center">
                                        <p class="font-semibold text-2xl"> titulo del video </p>
                                    </div>
                                    <div class="p-8  flex justify-center items-center">
                                        <video id="model_video0" class="  max-h-96 rounded-lg" controls
                                            src="https://fotografia-soft1.s3.amazonaws.com/videos/video1.mp4">
    
                                        </video>
                                    </div>
    
                                    <div class="h-14 border-t border-gray-400 ">
    
                                    </div>
                                </dialog>
    
                           
                                <button type="button" id="bt_imagen0"
                                    class="relative border-2 rounded-lg h-20 w-20 text-center flex justify-center items-center font-bold">
                                    <img id="img_imagen0" class="h-20 w-20 opacity-80 border-2 rounded-lg" src=""
                                        alt="">
                                    <span id="img_contendio0" class="absolute text-xs bottom-2">
                                        Subiendo imagen...0
                                    </span>
                                </button>
    
                                <button id="bt_eliminar0"
                                    class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
    
    
                                <div class="flex justify-between  p-1">
                                    <button id="bt_izquierda0" class="hover:border px-1 rounded-md ">
                                        <svg class="w-5 h-5 text-gray-100 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                        </svg>
                                    </button>
                                    <button id="bt_derecha0" class="hover:border px-1 rounded-md ">
                                        <svg class="w-5 h-5 text-gray-100 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </button>
                                </div>
    
                                </div>
    
                                <div id="div1" class="relative p-0.5">
                                    <dialog id="modal1" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                                    <button id="bt_cerrar1" type="button"
                                        class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                                        X
                                    </button>
    
                                    <div class="border-b border-gray-400 p-3 text-center">
                                        <p class="font-semibold text-2xl"> titulo del video </p>
                                    </div>
                                    <div class="p-8  flex justify-center items-center">
                                        <video id="model_video1" class="  max-h-96 rounded-lg" controls
                                            src= "https://fotografia-soft1.s3.amazonaws.com/videos/video2.mp4">
    
                                        </video>
                                    </div>
    
                                    <div class="h-14 border-t border-gray-400 ">
    
                                    </div>
                                </dialog>
    
                                <button type="button" id="bt_imagen1"
                                    class="relative border-2 rounded-lg h-20 w-20 text-center flex justify-center items-center font-bold">
                                    <img id="img_imagen1" class="h-20 w-20 opacity-80 border-2 rounded-lg" src=""
                                        alt="">
                                    <span id="img_contendio1" class="absolute text-xs bottom-2 ">
                                        Subiendo imagen...1
                                    </span>
                                </button>
    
                                <button id="bt_eliminar1"
                                    class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
    
    
                                <div class="flex justify-between p-1">
                                    <button id="bt_izquierda1" class="hover:border px-1 rounded-md ">
                                        <svg class="w-5 h-5 text-gray-100 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                        </svg>
                                    </button>
                                    <button id="bt_derecha1" class="hover:border px-1 rounded-md ">
                                        <svg class="w-5 h-5 text-gray-100 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </button>
                                </div>
    
                                </div>
    
    
                                <div id="div2" class="relative p-0.5">
                                    <dialog id="modal2" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                                    <button id="bt_cerrar2" type="button"
                                        class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                                        X
                                    </button>
                                    <div class="border-b border-gray-400 p-3 text-center">
                                        <p class="font-semibold text-2xl"> titulo del video </p>
                                    </div>
                                    <div class="p-8  flex justify-center items-center">
                                        <video id="model_video2" class="  max-h-96 rounded-lg" controls
                                            src="https://fotografia-soft1.s3.amazonaws.com/videos/video3.mp4">
                                        </video>
                                    </div>
    
                                    <div class="h-14 border-t border-gray-400 ">
    
                                    </div>
                                </dialog>
    
                                <button type="button" id="bt_imagen2"
                                    class="relative border-2 rounded-lg h-20 w-20 text-center flex justify-center items-center font-bold">
                                    <img id="img_imagen2" class="h-20 w-20 opacity-80 border-2 rounded-lg" src=""
                                        alt="">
                                    <span id="img_contendio2" class="absolute text-xs bottom-2 ">
                                        Subiendo imagen...2
                                    </span>
                                </button>
    
                                <button id="bt_eliminar2"
                                    class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
    
    
                                <div class="flex justify-between p-1">
                                    <button id="bt_izquierda2" class="hover:border px-1 rounded-md ">
                                        <svg class="w-5 h-5 text-gray-100 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                        </svg>
                                    </button>
                                    <button id="bt_derecha2" class="hover:border px-1 rounded-md ">
                                        <svg class="w-5 h-5 text-gray-100 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </button>
                                </div>
    
                            </div> --}}

                        </div>
                    </div>
                </div>

                <div class="w-full flex justify-between mt-8  ">
                    <video id="ia_video"  autoplay
                        class="bg-black aspect-video rounded-md border h-96   object-center">
                        {{-- <source id="video_src" src=""  type="video/mp4">  --}}
                        {{-- Tu navegador no soporta videos --}}
                    </video>

                    <video id="videoPreCargar" style="display: none;"></video>


                    <div class=" w-[10%] flex flex-col justify-end items-center space-y-8  p-3">

                        <button id="bt_reset">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                            </svg>
                        </button>
                        <button id="bt_pause">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 12 16">
                                <path
                                    d="M3 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm7 0H9a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                            </svg>
                        </button>
                        <button id="bt_play">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                                <path
                                    d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                            </svg>
                        </button>


                    </div>
                </div>


            </div>

        </div>


        <script>
            console.log('hola vista show');
            const $programa_id = @json($program->id);
            const $news = @json($news);
            let images_news = @json($avatarRoutes);
            const $len_avatars = @json($avatars->count());


            let videos = [
                // "https://fotografia-soft1.s3.amazonaws.com/videos/video1.mp4",
                // "https://fotografia-soft1.s3.amazonaws.com/videos/video2.mp4",
                // "https://fotografia-soft1.s3.amazonaws.com/videos/video3.mp4",
            ];
        </script>



    </div>
</x-app-layout>
