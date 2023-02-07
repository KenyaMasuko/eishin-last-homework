<x-app-layout>
    <div class="py-6 px-8 ml-56 text-white">
        <div class="flex items-center justify-between">
            <h1 class="text-4xl font-extrabold dark:text-white">応募一覧</h1>
        </div>
        <div class="mt-6 relative overflow-x-auto flex gap-5">
            @foreach ($applications as $application)
            <div
                class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $application->title
                    }}
                </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $application->company->name }}</p>
                <a href="{{ route('user.apply.show', $application->id) }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    詳しく見る
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
