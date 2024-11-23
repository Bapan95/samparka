<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center">
            Membership Details
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <table class="table-auto w-full text-left text-gray-700 dark:text-gray-200">
                @foreach (['branch', 'name', 'date_of_birth', 'age', 'date_of_receipt', 'class', 'occupation', 'front', 'newspaper', 'monthly_income', 'levy_rate', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'state_relief_fund', 'one_day_income', 'aid_fago', 'comment'] as $field)
                    <tr>
                        <th class="py-2 px-4">{{ ucwords(str_replace('_', ' ', $field)) }}</th>
                        <td class="py-2 px-4">{{ $membership->$field }}</td>
                    </tr>
                @endforeach
            </table>

            <a href="{{ route('memberships.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6 inline-block">
                Back to List
            </a>
        </div>
    </div>
</x-app-layout>
