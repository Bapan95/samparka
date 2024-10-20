<!-- resources/views/components/action-button.blade.php -->
@if ($type === 'edit')
    <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
        Edit
    </a>
@elseif ($type === 'delete')
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
            Delete
        </button>
    </form>
@endif
