<a href="{{ isset($user['id']) ? route('profile.edit', $user['id']) : '#' }}"
   class="bg-yellow-500 text-white px-4 py-2 rounded mr-2"
   aria-label="Edit {{ $user['name'] ?? 'User' }}">
    Edit
</a>

<form action="{{ isset($user['id']) ? route('profile.destroy', $user['id']) : '#' }}"
      method="POST"
      onsubmit="return confirm('Are you sure you want to delete this user?');"
      class="inline-block">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="bg-red-500 text-white px-4 py-2 rounded"
            aria-label="Delete {{ $user['name'] ?? 'User' }}">
        Delete
    </button>
</form>
