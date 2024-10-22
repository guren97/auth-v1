<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}  <!-- Change header to Posts -->
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">{{ __('All Posts') }}</h3>
                    <ul>
                        @foreach ($posts as $post)  <!-- Assuming $posts is passed from your controller -->
                            <li class="mt-2">
                                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-200 ease-in-out underline">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
