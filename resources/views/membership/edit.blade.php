<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Membership
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('memberships.update', $membership->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Branch Dropdown -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="branch">Branch</label>
                    <select name="branch" id="branch" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white">
                        <option value="">Select Branch</option>
                        @foreach ($branches as $branch_name)
                            <option value="{{ $branch_name }}"
                                {{ old('branch', $membership->branch) == $branch_name ? 'selected' : '' }}>
                                {{ $branch_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('branch')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Name Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="name">Name</label>
                    <input type="text" name="name" id="name"
                        class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                        value="{{ old('name', $membership->name) }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date of Birth Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="date_of_birth">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth"
                        class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                        value="{{ old('date_of_birth', $membership->date_of_birth) }}">
                    @error('date_of_birth')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Age -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="age">Age</label>
                    <input type="text" name="age" id="age"
                        class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                        value="{{ old('age', $membership->calculateAge()) }}" readonly>
                    @error('age')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date of Receipt Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="date_of_receipt">Date of Receipt of
                        Membership</label>
                    <input type="date" name="date_of_receipt" id="date_of_receipt"
                        class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                        value="{{ old('date_of_receipt', $membership->date_of_receipt) }}">
                    @error('date_of_receipt')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Newspaper Dropdown -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="newspaper">Newspaper</label>
                    <select name="newspaper" id="newspaper"
                        class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white">
                        <option value="">Select Newspaper</option>
                        @foreach ($newspapers as $newspaper_name)
                            <option value="{{ $newspaper_name }}"
                                {{ old('newspaper', $membership->newspaper) == $newspaper_name ? 'selected' : '' }}>
                                {{ $newspaper_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('newspaper')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Occupation -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="occupation">Occupation</label>
                    <input type="text" name="occupation" id="occupation"
                        class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                        value="{{ old('occupation', $membership->occupation) }}">
                    @error('occupation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Other Fields -->
                @foreach (['front', 'monthly_income', 'levy_rate', 'state_relief_fund', 'one_half_two_day_income', 'aid_fago', 'comment'] as $field)
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                        <input type="text" name="{{ $field }}" id="{{ $field }}"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old($field, $membership->$field) }}">
                        @error($field)
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

                <!-- Calendar Months (Checkboxes) -->
                @php
                    $currentMonth = now()->month;  // Get the current month
                @endphp

                @foreach ([
                    'january' => 1, 'february' => 2, 'march' => 3, 'april' => 4, 'may' => 5, 
                    'june' => 6, 'july' => 7, 'august' => 8, 'september' => 9, 'october' => 10, 
                    'november' => 11, 'december' => 12
                ] as $monthName => $monthNumber)
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="{{ $monthName }}" id="{{ $monthName }}" 
                                   class="form-checkbox dark:bg-gray-700 dark:border-gray-600"
                                   value="levey givens"
                                   @if (!empty($membership->levy_rate) && $monthNumber <= $currentMonth) 
                                       checked 
                                   @endif>
                            <span class="ml-2 text-gray-700 dark:text-gray-200">{{ ucwords($monthName) }}</span>
                        </label>
                    </div>
                @endforeach

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
