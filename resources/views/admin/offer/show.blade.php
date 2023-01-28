<x-app-layout>
    <div class="py-6 px-8 ml-56 text-white">
        <div class="flex items-center justify-between">
            <h1 class="text-4xl font-extrabold dark:text-white">求人詳細</h1>
            <a href="{{ route('admin.offer.index') }}"
                class="inline-block text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">戻る</a>
        </div>
        <div class="mt-8">
            <div class="mb-6">
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">求人名</div>
                <p class="font-light text-gray-500 dark:text-gray-400">{{ $offer['title'] }}</p>
            </div>
            <div class="mb-6">
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">求人詳細</div>
                <p class="font-light text-gray-500 dark:text-gray-400">{{ $offer['description'] }}</p>
            </div>
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">求人タグ</div>
            <ul class="max-w-md text-gray-500 list-inside dark:text-gray-400 gap-4 flex items-center">
                @foreach ($offer->features as $feature)
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ $feature->feature }}
                </li>
                @endforeach
            </ul>

            <div class="mt-6 flex items-center">
                <input disabled {{ $offer['is_public']===1 ? 'checked' : '' }} id="disabled-checked-checkbox"
                    type="checkbox" value=""
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="disabled-checked-checkbox"
                    class="ml-2 text-sm font-medium text-white dark:text-gray-400">公開中</label>
            </div>

        </div>
    </div>
</x-app-layout>
