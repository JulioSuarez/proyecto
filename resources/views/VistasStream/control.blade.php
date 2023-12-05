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
                    <p class="font-bold text-lg ">Centro de control </p>
                    <div id="div_control_videos" class="flex space-x-5 overflow-x-auto h-36   ">


                        <div id="div0" class="relative">
                            <dialog id="modal0" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                                <button id="bt_cerrar0" type="button" class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                                    X
                                </button>

                                <div class="border-b border-gray-400 p-3 text-center">
                                     <p class="font-semibold text-2xl"> titulo del video </p>
                                </div>
                                <div class="p-8  flex justify-center items-center">
                                    <video id="model_video0" class="  max-h-96 rounded-lg"
                                    controls src="https://fotografia-soft1.s3.amazonaws.com/videos/video1.mp4">

                                    </video>
                                </div>

                                <div class="h-14 border-t border-gray-400 ">

                                </div>
                            </dialog>

                            <button type="button"
                            id="bt_imagen0"
                            class="relative border-2 rounded-lg h-28 w-28 text-center flex justify-center items-center font-bold">
                            <img id="img_imagen0" class="h-28 w-28 opacity-80 border-2 rounded-lg" src="" alt="">
                            <span id="img_contendio0" class="absolute ">
                                Subiendo imagen...0
                            </span>
                            </button>

                            <button id="bt_eliminar0" class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>


                            <div class="flex justify-between px-3 py-1">
                                <button id="bt_izquierda0" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                      </svg>
                                </button>
                                <button id="bt_derecha0" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                      </svg>
                                </button>
                            </div>

                        </div>

                        <div id="div1" class="relative">
                            <dialog id="modal1" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                                <button id="bt_cerrar1" type="button" class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                                    X
                                </button>

                                <div class="border-b border-gray-400 p-3 text-center">
                                     <p class="font-semibold text-2xl"> titulo del video </p>
                                </div>
                                <div class="p-8  flex justify-center items-center">
                                    <video id="model_video1" class="  max-h-96 rounded-lg"
                                    controls src= "https://fotografia-soft1.s3.amazonaws.com/videos/video2.mp4">

                                    </video>
                                </div>

                                <div class="h-14 border-t border-gray-400 ">

                                </div>
                            </dialog>

                            <button type="button"
                            id="bt_imagen1"
                            class="relative border-2 rounded-lg h-28 w-28 text-center flex justify-center items-center font-bold">
                            <img id="img_imagen1" class="h-28 w-28 opacity-80 border-2 rounded-lg" src="" alt="">
                            <span id="img_contendio1" class="absolute ">
                                Subiendo imagen...1
                            </span>
                            </button>

                            <button id="bt_eliminar1" class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>


                            <div class="flex justify-between px-3 py-1">
                                <button id="bt_izquierda1" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                      </svg>
                                </button>
                                <button id="bt_derecha1" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                      </svg>
                                </button>
                            </div>

                        </div>


                        <div id="div2" class="relative">
                            <dialog id="modal2" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                                <button id="bt_cerrar2" type="button" class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                                    X
                                </button>
                                <div class="border-b border-gray-400 p-3 text-center">
                                     <p class="font-semibold text-2xl"> titulo del video </p>
                                </div>
                                <div class="p-8  flex justify-center items-center">
                                    <video id="model_video2" class="  max-h-96 rounded-lg"
                                    controls src="https://fotografia-soft1.s3.amazonaws.com/videos/video3.mp4">
                                    </video>
                                </div>

                                <div class="h-14 border-t border-gray-400 ">

                                </div>
                            </dialog>

                            <button type="button"
                            id="bt_imagen2"
                            class="relative border-2 rounded-lg h-28 w-28 text-center flex justify-center items-center font-bold">
                            <img id="img_imagen2" class="h-28 w-28 opacity-80 border-2 rounded-lg" src="" alt="">
                            <span id="img_contendio2" class="absolute ">
                                Subiendo imagen...2
                            </span>
                            </button>

                            <button id="bt_eliminar2" class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>


                            <div class="flex justify-between px-3 py-1">
                                <button id="bt_izquierda2" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                      </svg>
                                </button>
                                <button id="bt_derecha2" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                      </svg>
                                </button>
                            </div>

                        </div>




                    </div>


                </div>

                <button id="prueba" class="btn-red">
                    prueba
                </button>

                <button id="prueba2" class="btn-green">
                    prueba
                </button>



                <video id="ia_video" controls autoplay class="bg-transparent rounded-md border h-96 object-cover">
                    {{-- <source id="video_src" src=""  type="video/mp4">  --}}
                    Tu navegador no soporta videos
                </video>

                <video id="videoPreCargar" style="display: none;"></video>





                <div class="flex justify-center space-x-8 mt-4 bg-gray-100 py-3">
                    <button>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 12 16">
                            <path d="M10.819.4a1.974 1.974 0 0 0-2.147.33l-6.5 5.773A2.014 2.014 0 0 0 2 6.7V1a1 1 0 0 0-2 0v14a1 1 0 1 0 2 0V9.3c.055.068.114.133.177.194l6.5 5.773a1.982 1.982 0 0 0 2.147.33A1.977 1.977 0 0 0 12 13.773V2.227A1.977 1.977 0 0 0 10.819.4Z"/>
                          </svg>
                    </button>
                    <button id="bt_play">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                            <path d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z"/>
                          </svg>
                    </button>
                    <button id="bt_pause">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 12 16">
                            <path d="M3 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm7 0H9a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z"/>
                          </svg>
                    </button>

                    <button>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 12 16">
                            <path d="M11 0a1 1 0 0 0-1 1v5.7a2.028 2.028 0 0 0-.177-.194L3.33.732A2 2 0 0 0 0 2.227v11.546A1.977 1.977 0 0 0 1.181 15.6a1.982 1.982 0 0 0 2.147-.33l6.5-5.773A1.88 1.88 0 0 0 10 9.3V15a1 1 0 1 0 2 0V1a1 1 0 0 0-1-1Z"/>
                          </svg>
                    </button>
                </div>


            </div>
        </div>

        <script>

            console.log('hola desde control');
            let ia_video = document.getElementById('ia_video');
            let videoPreCargar = document.getElementById('videoPreCargar');
            let videos = [
                "https://fotografia-soft1.s3.amazonaws.com/videos/video1.mp4",
                "https://fotografia-soft1.s3.amazonaws.com/videos/video2.mp4",
                "https://fotografia-soft1.s3.amazonaws.com/videos/video3.mp4",
            ];
            let contador = 0;

            document.getElementById('bt_play').addEventListener('click', function() {
                console.log('click en PLAY')


                // elegir video que se reproducira
                if (contador >= videos.length) {
                    contador = 0;
                }

                // precargar video
                // console.log('aux = ' + calciularSigContador());
                videoPreCargar.src = videos[calciularSigContador()];
                videoPreCargar.load();

                // console.log('contador = ' + contador);
                // console.log('contador++ = '+ calciularSigContador());
                // console.log(videoPreCargar);
                console.log(videos[contador]);
                ia_video.src = videos[contador];

                ia_video.load();
                ia_video.play();

            });

            ia_video.addEventListener('play', function() {
                console.log('se incio el video');
                // if( contador = videos.length ){
                //   contador = 0;
                //   }

                //   ia_video.src = videos[contador];
                //   ia_video.play();
            });

            document.getElementById('bt_pause').addEventListener('click', function() {
                console.log('click en pause')
                ia_video.pause();
            });


            ia_video.addEventListener('ended', function() {
                console.log('se termino de reproducir el video');
                contador++;
                // console.log(contador);

                //elegir video que se reproducira
                if (contador >= videos.length) {
                    contador = 0;
                }

                // precargar video
                console.log('contador = ' + contador);
                // console.log('contador++ = '+ calciularSigContador());
                // console.log('contador++ = ' calciularSigContador);
                videoPreCargar.src = videos[calciularSigContador()];
                videoPreCargar.load();



                console.log(videos[contador]);
                ia_video.src = videos[contador];


                ia_video.load();
                ia_video.play();
            });


            //function
            function calciularSigContador() {
                // console.log('contadorxd: '+contador++);
                let aux =  contador + 1;
                console.log(('aux: '+ aux));
                if (aux >= videos.length) {
                    aux = 0;
                }
            return aux;
            }

        </script>



    </div>
</x-navbar-inquilinos>
