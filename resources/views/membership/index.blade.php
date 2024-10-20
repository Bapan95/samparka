<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Membership List
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <div class="mb-4 flex">
                <a href="{{ route('memberships.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto">
                    Create New Membership
                </a>
            </div>

            <!-- Search Form -->
            <form method="GET" action="{{ route('memberships.index') }}">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                    <!-- Search by Name -->
                    <div>
                        <label class="block text-gray-700 dark:text-gray-200">Search by Name</label>
                        <select name="name" id="name" class="form-select block w-full mt-1 dark:bg-gray-700 dark:text-white">
                            <option value="">All Names</option>
                            @foreach ($names as $name)
                                <option value="{{ $name->name }}" {{ request('name') == $name->name ? 'selected' : '' }}>
                                    {{ $name->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search by Branch -->
                    <div>
                        <label class="block text-gray-700 dark:text-gray-200">Search by Branch</label>
                        <select name="branch" id="branch" class="form-select block w-full mt-1 dark:bg-gray-700 dark:text-white">
                            <option value="">All Branches</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->branch_name }}" {{ request('branch') == $branch->branch_name ? 'selected' : '' }}>
                                    {{ $branch->branch_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Button -->
                    <div class="flex items-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
                            Search
                        </button>
                    </div>
                </div>
            </form>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Membership Table -->
            <table class="min-w-full bg-white dark:bg-gray-900 mt-4" id="example1">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="py-2 px-4 border-b dark:border-gray-600">Name</th>
                        <th class="py-2 px-4 border-b dark:border-gray-600">Branch</th>
                        <th class="py-2 px-4 border-b dark:border-gray-600">Age</th>
                        <th class="py-2 px-4 border-b dark:border-gray-600">Date of Receipt</th>
                        <th class="py-2 px-4 border-b dark:border-gray-600">Occupation</th>
                        <th class="py-2 px-4 border-b dark:border-gray-600">Front</th>
                        <th class="py-2 px-4 border-b dark:border-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($memberships as $membership)
                        <tr>
                            <td class="py-2 px-4 border-b dark:border-gray-600">{{ $membership->name }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-600">{{ $membership->branch }}</td>
                            {{-- <td class="py-2 px-4 border-b dark:border-gray-600">{{ $membership->age }}</td> --}}
                            <td class="py-2 px-4 border-b dark:border-gray-600">{{ $membership->calculateAge() }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-600">{{ $membership->date_of_receipt }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-600">{{ $membership->occupation }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-600">{{ $membership->front }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-600">
                                <a href="{{ route('memberships.show', $membership->id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                <a href="{{ route('memberships.edit', $membership->id) }}" class="ml-4 text-yellow-500 hover:text-yellow-700">Edit</a>
                                <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" class="inline-block ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 px-4 text-center text-gray-500 dark:text-gray-400">
                                No memberships found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
