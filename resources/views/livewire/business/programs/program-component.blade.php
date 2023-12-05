<div>
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
    <div>
        <x-primary-button class="m-2 transition hover:scale-105" wire:click="create">
            {{ __('Create Program') }}
        </x-primary-button>
    </div>

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
                <h2 class="text-2xl font-bold mb-4">{{ $programId ? 'Edit Program' : 'Create Program' }}
                </h2>
                <form <form wire:submit.prevent="{{ $programId ? 'update' : 'store' }}">
                    <div class="flex flex-col mb-4 lg:flex-row lg:justify-evenly">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                            <input type="text" id="title" wire:model="title"
                                class="w-full border border-gray-300 px-4 py-2 rounded">
                            <span class="text-red-500"> @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div>
                            <label for="date" class="block text-gray-700 font-bold mb-2">Date:</label>
                            <input type="date" id="date" wire:model="date"
                                class="w-full border border-gray-300 px-4 py-2 rounded">
                            <span class="text-red-500"> @error('date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2">
                            {{ $programId ? 'Update' : 'Create' }}</button>
                        <button type="button"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                            wire:click="closeModal">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    @endif

    

    <div class="grid w-full gap-4 px-4 max-w-7xl md:grid-cols-3 mt-4">
        @forelse ($programs as $program)
            <div
                class="max-w-3xl whitespace-normal break-words rounded-lg border border-blue-gray-50 bg-white p-4 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">
                <div class="flex justify-between gap-8">
                    <a href="{{ route('programs.show', $program) }}"
                        class="hover:scale-110 block font-sans text-base font-medium leading-relaxed tracking-normal text-blue-gray-900 antialiased transition-colors hover:text-blue-500">
                        {{ __($program->title) }}
                    </a>
                    <div
                        class="rounded-full py-1 px-2 font-sans text-xs font-medium capitalize leading-none tracking-wide text-white {{ now()->startOfDay()->isAfter(\Carbon\Carbon::parse($program->date)->startOfDay()) ? 'bg-red-500' : 'bg-green-400' }}">
                        <div class="mt-px">{{ __($program->date) }}</div>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-5">
                    <div wire:click="edit({{ $program->id }})" class="cursor-pointer flex items-center gap-1 transition hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                            <path
                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                        </svg>
                        <p class="block font-sans text-xs font-normal text-black antialiased">
                            Edit
                        </p>
                    </div>
                    <div wire:click="delete({{ $program->id }})" class="cursor-pointer flex items-center gap-1 transition hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                            <path fill="#ec1818"
                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                        </svg>
                        <p class="block font-sans text-xs font-normal text-red-700 antialiased">
                            delete
                        </p>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>

</div>
