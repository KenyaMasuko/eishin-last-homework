<x-app-layout>
    <div class="py-6 px-8 ml-56 text-white">
        <div class="flex items-center justify-between">
            <h1 class="text-4xl font-extrabold dark:text-white">求人一覧</h1>
        </div>

        <div class="mt-6 relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            求人名
                        </th>
                        <th scope="col" class="px-6 py-3">
                            募集会社
                        </th>
                        <th scope="col" class="px-6 py-3">
                            作成日時
                        </th>
                        <th scope="col" class="px-6 py-3">
                            アクション
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $offer->id }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $offer->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $offer->company->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $offer->created_at }}
                        </td>
                        <td class="px-6 py-4 flex items-center gap-4">
                            <a href="{{ route('admin.offer.show', $offer->id) }}"
                                class="inline-block text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">確認</a>
                            <form action="{{ route('company.offer.destroy', $offer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <ul>
        </ul>
    </div>
</x-app-layout>
