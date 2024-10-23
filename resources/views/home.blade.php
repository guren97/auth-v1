<x-app-layout> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 "> 
                    <!-- Pagination Links -->
                    <div class="mb-6">
                        {{ $posts->links() }}
                    </div>
                    <!-- Loop through posts -->
                    @foreach($posts as $post)
                    <a  href="/posts/{{ $post->id }}">
                        <div class="mb-6 p-4 bg-white rounded-lg shadow-sm border border-gray-200 hover:bg-gray-50">
                            <!-- Post Header -->
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <!-- Example user avatar -->
                                    <img src="https://via.placeholder.com/40" alt="User avatar" class="rounded-full w-10 h-10 mr-3">
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $post->user->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <!-- Action buttons -->
                                <div class="flex space-x-2">
                                    <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">
                                        Edit
                                    </button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                                        Delete
                                    </button>
                                </div>
                            </div>

                            <!-- Post Content -->
                            <div class="mt-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                                <p class="text-gray-700 mt-2">{{ $post->content }}</p>
                            </div> 
                        </div>
                        </a>
                    @endforeach 
                    <!-- Pagination Links -->
                    <div class="mt-6 ">
                        {{ $posts->links() }}
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</x-app-layout>
