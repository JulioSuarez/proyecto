<x-guest-layout>
  

    @vite('resources/js/stripe.js')
   
    

 <div class="pt-6 w-full flex justify-center">
    <div class="w-full flex  sm:max-w-4xl mt-6 px-3 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="w-1/2 flex flex-col space-y-8 pr-7 pl-5">
            <p> Complete su compra para comenzar a aprender </p>
            <div>
                <img class="h-56 "
                    src="https://scontent.fsrz1-2.fna.fbcdn.net/v/t39.30808-6/306696242_2022526374615946_5961266096114267716_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=c83dfd&_nc_ohc=8-mbKNO71pcAX8DFHZg&_nc_ht=scontent.fsrz1-2.fna&oh=00_AfBwDsCf03J0TZbTFD27CTsGhQjDH1K8IA-lHykmsCXqAw&oe=6572BB51"
                    alt="">
            </div>

            <div class="flex justify-between border-b-2 border-gray-300">
                <div class="flex flex-col">
                    <span class="font-bold text-xl "> Suscripcion {{ $suscripcion->nombre  }}  -
                        mensual</span>
                    <span> suscripcion</span>
                </div>

                <div class="flex flex-col ">
                    <span class="font-bold text-xl text-right "> $ {{ $suscripcion->precio }}</span>
                    <span> cada mes</span>
                </div>
            </div>

            <div class="flex justify-between border-b-2 border-gray-300">
                <span class="font-semibold"> Total a ser pagado hoy </span>
                <p> USD <span class="font-semibold">$ {{ $suscripcion->precio }}</span></p>
            </div>

        </div>

        <div class="border-gray-400 border-l-2 px-5 flex-1 flex flex-col justify-between">


         @livewire('pago_suscripcion' )

        </div>
    </div>

 </div>

 
</x-guest-layout>
