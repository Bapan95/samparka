<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-500 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <div class="mb-4 flex">
                <a href="{{ route('register') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto"
                    aria-label="Add New User">
                    Add New User
                </a>
            </div>

            @php
                $i = ($users->currentPage() - 1) * $users->perPage() + 1; // Starting point for pagination
            @endphp

            <x-data-table :headers="['sl no', 'Name', 'Email', 'Role', 'Actions']" :rows="$users
                ->map(function ($user) use (&$i) {
                    return [
                        'sl_no' => $i++, // Increment $i for each user
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role,
                        'actions' => view('users.partials.user-action', ['user' => $user])->render(),
                    ];
                })
                ->toArray()">
                {{ $users->links() }}
            </x-data-table>
        </div>
    </div>
</x-app-layout>
