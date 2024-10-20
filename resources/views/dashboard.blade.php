<x-app-layout>
    <x-slot name="header">
        {{-- <h1>Welcome to Samparka</h1> --}}
        <p style="text-align: center;font-size:30px">ভারতের কমিউনিস্ট পার্টি (মার্কসবাদী)</p>
        <p style="text-align: center;font-size:25px">জাঙ্গীপাড়া এরিয়া কমিটি ২০</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
