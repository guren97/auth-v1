<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="h-dvh mx-auto flex max-w-7xl justify-between gap-4 sm:px-6 lg:px-8">
            <div class="h-96 w-4/12 bg-white p-4 shadow-sm sm:rounded-lg">
                Left
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="inline-block min-w-full p-1.5 align-middle">
                            <div class="divide-y divide-gray-200 rounded-lg border">
                                <div class="px-4 py-3">
                                    <div class="relative max-w-xs">
                                        <label class="sr-only">Search</label>
                                        <input type="text" name="hs-table-with-pagination-search"
                                            id="hs-table-with-pagination-search"
                                            class="block w-full rounded-lg border-gray-200 px-3 py-2 ps-9 text-sm shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                                            placeholder="Search for items">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                            <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <path d="m21 21-4.3-4.3"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-4 py-3 pe-0">
                                                    <div class="flex h-5 items-center">
                                                        <input id="hs-table-pagination-checkbox-all" type="checkbox"
                                                            class="rounded border-gray-200 text-blue-600 focus:ring-blue-500">
                                                        <label for="hs-table-pagination-checkbox-all"
                                                            class="sr-only">Checkbox</label>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium uppercase">
                                                    Title</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium uppercase">
                                                    Content</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium uppercase">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            @foreach (Auth::user()->posts as $post)
                                                <tr class="bg-white hover:bg-gray-50">
                                                    <td class="py-3 ps-4">
                                                        <div class="flex h-5 items-center">
                                                            <input id="hs-table-pagination-checkbox-3" type="checkbox"
                                                                class="rounded border-gray-200 text-blue-600 focus:ring-blue-500 dark:border-neutral-700">
                                                            <label for="hs-table-pagination-checkbox-3"
                                                                class="sr-only">Checkbox</label>
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-normal px-6 py-4 text-sm font-medium">
                                                        <a href="{{ url('posts', $post->id) }}">{{ $post->title }}</a>
                                                    </td>

                                                    <td
                                                        class="max-h-24 overflow-hidden whitespace-normal px-6 py-4 text-sm text-gray-800">
                                                        <div class="content-preview"
                                                            id="content-preview-{{ $post->id }}">
                                                            {{ $post->content }}
                                                        </div>
                                                        <button type="button"
                                                            class="mt-2 text-blue-600 hover:text-blue-800"
                                                            onclick="toggleContent('{{ $post->id }}')">
                                                            See More
                                                        </button>
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap px-6 py-4 text-end text-sm font-medium">
                                                        <button type="button"
                                                            class="inline-flex items-center gap-x-2 rounded-lg border border-transparent text-sm font-semibold text-blue-600 hover:text-blue-800 focus:text-blue-800 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function toggleContent(postId) {
            const contentPreview = document.getElementById(`content-preview-${postId}`);
            const button = event.target;

            if (contentPreview.classList.contains('max-h-24')) {
                contentPreview.classList.remove('max-h-24');
                contentPreview.classList.add('max-h-none'); // Remove height restriction
                button.innerText = 'See Less'; // Change button text
            } else {
                contentPreview.classList.add('max-h-24');
                contentPreview.classList.remove('max-h-none'); // Restore height restriction
                button.innerText = 'See More'; // Change button text
            }
        }
    </script>
</x-app-layout>
