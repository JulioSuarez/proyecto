<div>
    {{--  Session Message  --}}
    @if (session()->has('success'))
        <div
            class="relative flex flex-col sm:flex-row sm:items-center bg-green-700 dark:bg-green-700 shadow rounded-md py-5 pl-6 pr-8 sm:pr-6 mb-3 mt-3">
            <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                <div class="text-green-500 dark:text-gray-500">
                    <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-sm font-medium ml-3 text-white">Success!.</div>
            </div>
            <div class="text-sm tracking-wide text-white dark:text-white mt-4 sm:mt-0 sm:ml-4">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <x-primary-button class="m-2" wire:click="openModal">
        {{ __('Upload Avatars') }}
    </x-primary-button>

    @if ($open)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative bg-gray-50 p-8 rounded-md shadow-lg w-1/2 max-h-[80vh] overflow-y-auto">
                <svg wire:click.prevent="$set('open', false)"
                    class="ml-auto w-6 h-6 text-gray-900 dark:text-gray-900 cursor-pointer fill-current"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                </svg>
                <h2 class="text-2xl font-bold mb-4">{{ 'Upload Avatars' }}
                </h2>
                <form <form wire:submit.prevent="{{ 'store' }}">
                    <div>
                        <div class="mt-4 mb-8">
                            <x-input-label for="avatars" value="{{ __('Avatars') }}" />
                            <input wire:model="avatars" class="block mt-1 w-full" type="file" multiple name="avatars"
                                id="avatars" required accept="image/jpeg,image/png" />
                            <span class="text-red-500">
                                @error('avatars')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        @if ($avatars)
                            <h3 class="text-center font-semibold mt-4 mb-4">Preview</h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($avatars as $avatar)
                                    <img src="{{ $avatar->temporaryUrl() }}" alt="avatar" class="rounded-sm" width="100px" height="100">
                                @endforeach
                            </div>
                        @endif

                        {{-- Muestra el indicador de carga mientras se está renderizando  --}}
                        <div class="flex justify-center p-4">
                            <div wire:loading wire:target="store"
                                class="animate-spin rounded-full border-t-4 border-blue-500 border-solid h-12 w-12 bg-red-500">
                            </div>
                        </div>
                        <div wire:loading.remove wire:target=""></div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2">
                            {{ 'Upload' }}
                        </button>
                        <button type="button"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                            wire:click="closeModal">
                            {{ __('Cancel') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    @endif


    <div class="grid grid-cols-3 md:grid-cols-4 gap-4">
        @forelse ($avatarsImg as $avatar)
            <div class="min-w-min h-96 relative">
                <img class="object-fill w-full h-full rounded-lg" src="{{ $avatar->route_path }}" alt="avatar">
                <div wire:click="delete({{$avatar->id}})"
                    class="absolute top-0 left-0 bg-red-600 rounded-br-lg rounded-tl-lg p-1 text-white font-bold text-xl transform hover:scale-105">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </div>
            </div>
        @empty
            <p class="text-justify">
                {{ __('Upload your own avatars with which they generate content for your projects') }}
            </p>
        @endforelse
    </div>
</div>
