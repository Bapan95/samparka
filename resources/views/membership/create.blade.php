<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center">
            Create New Membership
        </h1>
    </x-slot>

    <div class="container mt-4" style="max-width: 1240px;">
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded p-4">
            <form action="{{ route('memberships.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- Branch Dropdown -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="branch">Branch</label>
                        <select name="branch" id="branch"
                            class="form-select mt-1 block w-full dark:bg-gray-700 dark:text-white">
                            <option value="">Select Branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->branch_name }}"
                                    {{ old('branch') == $branch->branch_name ? 'selected' : '' }}>
                                    {{ $branch->branch_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('branch')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="name">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Birth Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="date_of_birth">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('date_of_birth') }}">
                        @error('date_of_birth')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Age Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="age">Age</label>
                        <input type="number" name="age" id="age"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('age') }}">
                        @error('age')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Receipt Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="date_of_receipt">Date of Receipt of
                            Membership</label>
                        <input type="date" name="date_of_receipt" id="date_of_receipt"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('date_of_receipt') }}">
                        @error('date_of_receipt')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Class Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="class">Class</label>
                        <input type="text" name="class" id="class"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('class') }}">
                        @error('class')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Occupation Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="occupation">Occupation</label>
                        <input type="text" name="occupation" id="occupation"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('occupation') }}">
                        @error('occupation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Front Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="front">Front</label>
                        <input type="text" name="front" id="front"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('front') }}">
                        @error('front')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Newspaper Dropdown -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="newspaper">Newspaper</label>
                        <select name="newspaper" id="newspaper"
                            class="form-select mt-1 block w-full dark:bg-gray-700 dark:text-white">
                            <option value="">Select Newspaper</option>
                            @foreach ($newspapers as $newspaper)
                                <option value="{{ $newspaper->newspaper_name }}"
                                    {{ old('newspaper') == $newspaper->newspaper_name ? 'selected' : '' }}>
                                    {{ $newspaper->newspaper_name }}</option>
                            @endforeach
                        </select>
                        @error('newspaper')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Monthly Income Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="monthly_income">Monthly
                            Income</label>
                        <input type="number" name="monthly_income" id="monthly_income"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('monthly_income') }}">
                        @error('monthly_income')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Levy Rate Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="levy_rate">Levy Rate</label>
                        <input type="number" name="levy_rate" id="levy_rate"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('levy_rate') }}">
                        @error('levy_rate')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Month Fields -->
                    {{-- @foreach (['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'] as $month)
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200"
                        for="{{ $month }}">{{ ucwords($month) }}</label>
                        <input type="number" name="{{ $month }}" id="{{ $month }}"
                        class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                        value="{{ old($month) }}">
                        @error($month)
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach --}}

                    <!-- State Relief Fund Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="state_relief_fund">State Relief
                            Fund</label>
                        <input type="number" name="state_relief_fund" id="state_relief_fund"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('state_relief_fund') }}">
                        @error('state_relief_fund')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- One Day Income Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="one_half_two_day_income">1 day
                            /half day / 2 day
                            income</label>
                        <input type="number" name="one_half_two_day_income" id="one_half_two_day_income"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('one_half_two_day_income') }}">
                        @error('one_half_two_day_income')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Aid Fago Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="aid_fago">Aid Fago</label>
                        <input type="text" name="aid_fago" id="aid_fago"
                            class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-white"
                            value="{{ old('aid_fago') }}">
                        @error('aid_fago')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Comment Field -->
                    <div class="col-md-4">
                        <label class="block text-gray-700 dark:text-gray-200" for="comment">Comment</label>
                        <textarea name="comment" id="comment" class="form-textarea mt-1 block w-full dark:bg-gray-700 dark:text-white" rows="1">{{ old('comment') }}</textarea>
                        @error('comment')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('date_of_birth').addEventListener('change', function() {
            var dob = new Date(this.value);
            if (!isNaN(dob.getTime())) { // Ensure valid date
                var today = new Date();
                var age = today.getFullYear() - dob.getFullYear();
                var month = today.getMonth() - dob.getMonth();
                if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                document.getElementById('age').value = age;
            } else {
                document.getElementById('age').value = ''; // Clear age if invalid date
            }
        });
    </script>
</x-app-layout>
