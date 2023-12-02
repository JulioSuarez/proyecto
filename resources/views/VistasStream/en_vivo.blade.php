<x-navbar-inquilinos>
    @vite('resources/js/StreamJS/en-vivo.js')
    <x-slot name='titulo'>
        Google Meet clon
    </x-slot>

    <div class="p-10">
        {{-- <div class="">
         

            <div class="flex ">
                <input type="file" class="input-xd" >
                <button class="btn-green">
                    go 
                </button>
            </div>

            <div class="mt-8 bg-white">
                    
                    <video src="" id="localVideoPlayer"
                        autoplay muted>

                    </video>
            </div>

        </div> --}}

        <div class="">

            <div class="flex">
              <div class="flex flex-col w-40 border" id="active-user-container">
                <h3 class="label-xd border p-2">Active Users:</h3>
                
              </div>
              <div class="p-4">
                <h2 class="label-xd" id="talking-with-info"> 
                  Select active user on the left menu.
                </h2>
                <div class="flex  space-x-10 bg-white h-72">
                  <video autoplay class="bg-black" id="remote-video"></video>
                  <video autoplay muted class="bg-black" id="local-video"></video>
                </div>
              </div>
            </div>
          </div>
    </div>


</x-navbar-inquilinos>