<!-- resources/views/articles/index.blade.php -->
<x-app-layout>
    <x-slot:title>
        Articles
    </x-slot:title>

    <x-slot:header>
        <h1 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center">Articles</h1>
    </x-slot:header>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <div class="mb-4 flex">
                <a href="{{ route('articles.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto"
                    aria-label="Add New Article">Add New Article</a>
            </div>

            <ul class="mt-4">
                @foreach ($articles as $article)
                    <li>
                        <strong>{{ $article->title }}</strong> ({{ $article->category->name }}) by
                        {{ $article->user->name }}
                        <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500">Read More</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
