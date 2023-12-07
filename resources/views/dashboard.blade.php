<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-center">

                    <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between mb-3">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Your
                                        progress
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                            <div class="grid grid-cols-3 gap-3 mb-2">
                                <dl
                                    class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[90px]">
                                    <dt
                                        class="w-10 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">
                                        {{  Auth::user()->programs->count() }}</dt>
                                    <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">Programs</dd>
                                </dl>
                                <dl
                                    class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[90px]">
                                    <dt
                                        class="w-10 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">
                                        {{  Auth::user()->avatars->count() }}</dt>
                                    <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">Avatars</dd>
                                </dl>
                                <dl
                                    class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[90px]">
                                    <dt
                                        class="w-10 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">
                                        {{  Auth::user()->newsCreated() }}</dt>
                                    <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">News Created</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center px-15 hover:text-blue-500 bg-slate-200  px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md transition ease-in-out duration-150">
                    <a href="{{ route('store.index') }}">
                        <span>To start you have 10 credit points, you can buy more credit in the store.</span>
                    </a>
                    <img class="w-5 h-5" src="{{ asset('images/star.png') }}" alt="">
                </div>


                 <div class="bg-white flex flex-row gap-2">
                    <img src="{{asset('images/18259283-e5b8-4e66-a8a2-92e7e0e6ba16.jpg')}}" alt="photo" class="w-1/2 p-4">
                    <img src="{{asset('images/bb64cb7d-90fd-455d-a8f8-b635687dcbeb.jpg')}}" alt="photo" class="w-1/2 p-4">
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
