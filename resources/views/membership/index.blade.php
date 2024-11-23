<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center">
            Membership List
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <div class="mb-4 flex">
                <a href="{{ route('memberships.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto">
                    Create New Membership
                </a>
            </div>

            <!-- Search Form -->
            <form method="GET" action="{{ route('memberships.index') }}">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                    <!-- Search by Name -->
                    <div>
                        <label class="block text-gray-700 dark:text-gray-200">Search by Name</label>
                        <select name="name" id="name"
                            class="form-select block w-full mt-1 dark:bg-gray-700 dark:text-white">
                            <option value="">All Names</option>
                            @foreach ($names as $name)
                                <option value="{{ $name->name }}"
                                    {{ request('name') == $name->name ? 'selected' : '' }}>
                                    {{ $name->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search by Branch -->
                    <div>
                        <label class="block text-gray-700 dark:text-gray-200">Search by Branch</label>
                        <select name="branch" id="branch"
                            class="form-select block w-full mt-1 dark:bg-gray-700 dark:text-white">
                            <option value="">All Branches</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->branch_name }}"
                                    {{ request('branch') == $branch->branch_name ? 'selected' : '' }}>
                                    {{ $branch->branch_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Button -->
                    <div class="flex items-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
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

            <div class="table-responsive">

                <!-- Membership Table -->
                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100" id="example1">
                    <thead>
                        <tr class="border border-gray-300">
                            <th style="border: 1px solid black; padding: 8px;">Name</th>
                            <th style="border: 1px solid black; padding: 8px;">Branch</th>
                            <th style="border: 1px solid black; padding: 8px;">Age</th>
                            <th style="border: 1px solid black; padding: 8px;">Date of Receipt</th>
                            <th style="border: 1px solid black; padding: 8px;">Occupation</th>
                            <th style="border: 1px solid black; padding: 8px;">Front</th>
                            <th style="border: 1px solid black; padding: 8px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($memberships as $membership)
                            <tr class="border border-gray-300">
                                <td style="border: 1px solid black; padding: 8px;">{{ $membership->name }}</td>
                                <td style="border: 1px solid black; padding: 8px;">{{ $membership->branch }}</td>
                                {{-- <td style="border: 1px solid black; padding: 8px;">{{ $membership->age }}</td> --}}
                                <td style="border: 1px solid black; padding: 8px;">{{ $membership->calculateAge() }}
                                </td>
                                <td style="border: 1px solid black; padding: 8px;">{{ $membership->date_of_receipt }}
                                </td>
                                <td style="border: 1px solid black; padding: 8px;">{{ $membership->occupation }}</td>
                                <td style="border: 1px solid black; padding: 8px;">{{ $membership->front }}</td>
                                <td style="border: 1px solid black; padding: 8px;">
                                    <a href="{{ route('memberships.show', $membership->id) }}" 
                                        class="btn btn-primary btn-sm mb-1">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('memberships.edit', $membership->id) }}" 
                                        class="btn btn-warning btn-sm mb-1 ml-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" 
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-1 mb-1" 
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
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
    </div>
</x-app-layout>
