<div>
    <div class=" rounded-lg bg-white  text-gray-800 font-light mb-6">
        <div class="w-full p-3  border-gray-200">

            {{-- //poner por defecto la predetermainda --}}
            {{-- <input type="hidden" id="es_nueva" name="es_nueva" value="false"> --}}

            <h1 class="mb-3 font-semibold flex">
                Metodos de pago:
                <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-6 ml-3">
            </h1>

            @if (count($metodos_pago))
            {{-- //hacer un foreach de la lista de tarjetas que hay  --}}
            @foreach ($metodos_pago as $metodo)
                {{-- @dd($metodo->id) --}}
                <div wire:target="elegirMetodoPago('{{ $metodo->id }}')"
                    wire:target="eliminarMetodoPago('{{ $metodo->id }}')" wire:loading.class="opacity-25"
                    class=" mb-2 mx-3 hover:bg-slate-100 rounded-lg p-1 flex justify-between">

                    <label for="tarjeta_{{ $metodo->id }}"
                        class="flex space-x-3 items-center cursor-pointer  h-10">
                        <input wire:click="elegirMetodoPago('{{ $metodo->id }}')"
                            wire:target="elegirMetodoPago('{{ $metodo->id }}')" wire:loading.attr="disabled"
                            type="radio" value="{{ $metodo->id }}" id="tarjeta_{{ $metodo->id }}"
                            class="form-radio h-5 w-5 text-indigo-500 disabled:opacity-25"
                            {{ auth()->user()->defaultPaymentMethod()->id == $metodo->id? 'checked': '' }}>

                        <div class="flex flex-col leading-none pr-4">
                            <span class="font-semibold capitalize flex  justify-between">
                                {{ $metodo->card->brand }} <span> •••• {{ $metodo->card->last4 }}</span>
                            </span>
                            <span>
                                Vence en {{ $meses[$metodo->card->exp_month] }} del {{ $metodo->card->exp_year }}
                            </span>
                        </div>
                        @if (array_key_exists($metodo->card->brand, $tipo_tarjeta))
                            {!! $tipo_tarjeta[$metodo->card->brand] !!}
                        @else
                            SVG
                        @endif
                    </label>

                    <button class="disabled:opacity-25" wire:click="deleteMetodoPago('{{ $metodo->id }}')"
                        wire:target="deleteMetodoPago('{{ $metodo->id }}')" wire:loading.attr="disabled"
                        {{ auth()->user()->defaultPaymentMethod()->id == $metodo->id? 'disabled': '' }}>
                        <svg class="w-6 h-6 text-red-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                        </svg>
                    </button>


                </div>
            @endforeach
        @else
            <p class="py-4 px-2 label-xd text-red-700"> no hay tarjeta registradas</p>
        @endif



            <div>
                <div class=" w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class=" bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Registra una nueva tarjeta
                            </h3>

                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4 border-t" wire:ignore>
                            <div class=" w-full ">

                                <div class="mb-3">
                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">
                                        Nombre en la tarjeta
                                    </label>
                                    <div>
                                        <input id="card-holder-name" wire:model.live='nombre'
                                            class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                            placeholder="Nombre en la tarjeta" type="text" />
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">
                                        Numero de tarjeta</label>
                                    <div id="card-element"
                                        class="w-full px-3 py-2 mb-1 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors ">
                                        <input class="w-full " type="text" />
                                    </div>
                                    <span id="error_tarjeta" class="text-red-500 font-medium"> </span>
                                </div>



                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-4 space-x-5 md:p-5  border-gray-200 rounded-b dark:border-gray-600">
                            
                          
                            <button id="card-button" data-secret="{{ $intent->client_secret }}"
                                class=" disabled:opacity-25 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Agregar metodo de pago
                            </button>
                               
                        </div>
                    </div>
                </div>












            </div>


        </div>

    </div>



    <div class="flex-1 px-3">

            <button type="button" class="bg-blue-700 flex w-full justify-center disabled:opacity-25space-x-4 text-white hover:bg-$color-800 focus:ring-4 focus:outline-none  focus:ring-$color-300 font-medium rounded-lg text-sm px-3 py-2 text-center items-center me-2"
            wire:click="nuevaSuscripcion"
                wire:target="nuevaSuscripcion" wire:loading.attr="disabled">

                <svg aria-hidden="true" wire:target="nuevaSuscripcion" wire:loading
                    class="w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span>
                    Realizar pago
                </span>
            </button>
      

       
    </div>


    @push('js')
    <script src="https://js.stripe.com/v3/"></script>
    
    <script>
        const stripe = Stripe("pk_test_51MzGDiJrLfX1VoDJMPD3WfaQ7yBDoXaNhgwiABhCS13dxpnWByn4WqNY2NSTq0QWAOrA3Sy1YX1weZPBHHG1D3c000G1rPwLFF");
        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');
</script>

    <script>
        console.log('hola que tal');
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');


        cardButton.addEventListener('click', async (e) => {

            console.log(' se ejecuto el click');
            //desahbilitar boton
            cardButton.disabled = true;

            const clientSecret = cardButton.dataset.secret;

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );

            if (error) {
                document.getElementById('error_tarjeta').textContent = error.message;
            } else {
                console.log('se agrego la tarjeta');
                @this.addMetodoPago(setupIntent.payment_method);
                //cerrar ventana xd xd

            }

            cardButton.disabled = false;
        });


        document.getElementById('error_tarjeta').addEventListener('change', () => {
            log('se cambio el error');
            document.getElementById('error_tarjeta').textContent = '';
        });
    </script>
@endpush

</div>
