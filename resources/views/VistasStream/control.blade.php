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
                    <div id="div_control_videos" class="flex space-x-5 overflow-x-auto ">

                        <div class="" id="video_1">
                            <img class="h-28 w-28 border-2 rounded-lg border-red-600" src="{{ asset('/images/video.png') }}" alt="">
                        </div>

                        <div class="border-2 rounded-lg bg-blue-600 h-28 w-28 text-center flex justify-center items-center font-bold " id="video_2">
                            <img class=" " src="https://i.pinimg.com/550x/b6/a3/d0/b6a3d082786c2b16f28d24ddf7cb88f2.jpg" alt="">
                            Subiendo imagen...
                        </div>

                        <div class="" id="video_3">
                            <img class="h-28 w-28 border-2 rounded-lg " src="{{ asset('/images/video.png') }}" alt="">
                        </div>

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
                        {{-- IA Video --}}
                    </p>
                    <button id=" bt_mostrar_video" class="hidden btn-red disabled ">
                        hoola
                    </button>
                </div>

              


                <video id="ia_video" controls autoplay class="bg-transparent rounded-md border h-80 object-cover">
                    {{-- <source id="video_src" src=""  type="video/mp4">  --}}
                    Tu navegador no soporta videos
                </video>

                <video id="videoPreCargar" style="display: none;"></video>


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
