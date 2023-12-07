<x-nav-bar-facebook>


    <div class="pb-12 pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h3 class="font-extrabold text-2xl  text-center">Actualizar datos </h3>

            <div class="flex  space-x-10">
                {{-- izquierda --}}
                <div class="space-y-10 w-[60%]">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="w-full">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>



                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="w-full">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="w-full">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

                {{-- derecha --}}
                <div class="w-[40%]">
                    <div class="p-4  bg-white shadow sm:rounded-lg w-full">
                            {{-- @include('profile.partials.seleccion-metodo-pago') --}}
                            @livewire('metodo-pago')
                    </div>


                </div>

            </div>


        </div>
    </div>
</x-nav-bar-facebook>
