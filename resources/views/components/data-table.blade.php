<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
    <table class="table-auto w-full mb-8 border-collapse mt-4" id="example1">
        <thead>
            <tr>
                @foreach($headers as $header)
                    <th class="border px-4 py-2">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $row)
                <tr>
                    @foreach($row as $cell)
                        <td class="border px-4 py-2">{{ $cell }}</td>
                    @endforeach
                    @if ($actions)
                        <td class="border px-4 py-2 flex space-x-2">
                            {{ $actions($row) }}
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) + ($actions ? 1 : 0) }}" class="border px-4 py-2 text-center">
                        No data found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Slot -->
    <div class="mt-4">
        {{ $slot }}
    </div>
</div>
