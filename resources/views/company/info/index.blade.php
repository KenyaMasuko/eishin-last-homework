<x-app-layout>
    <div class="py-6 px-8 ml-56 text-white">
        <div class="flex items-center justify-between">
            <h1 class="text-4xl font-extrabold dark:text-white">会社詳細</h1>
            <a href="{{ route('company.info.edit', $company->id) }}"
                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">更新</a>
        </div>
        <div class="mt-6 relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <tr class="px-6 py-3">
                    <th
                        class="px-6 py-3 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        NO</th>
                    <td class="px-6 py-3">{{ $company->id }}</td>
                </tr>
                <tr class="px-6 py-3">
                    <th
                        class="px-6 py-3 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        会社名
                    </th>
                    <td class="px-6 py-3">{{ $company->name }}</td>
                </tr>
                <tr class="px-6 py-3">
                    <th
                        class="px-6 py-3 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        代表者名
                    </th>
                    <td class="px-6 py-3">{{ $company['ceo_name'] ?? '未登録' }}</td>
                </tr>
                <tr class="px-6 py-3">
                    <th
                        class="px-6 py-3 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        メールアドレス
                    </th>
                    <td class="px-6 py-3">{{ $company->email ?? '未登録' }}</td>
                </tr>
                <tr class="px-6 py-3">
                    <th
                        class="px-6 py-3 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        業界
                    </th>
                    <td class="px-6 py-3"> {{ $industries->name ?? '未登録' }} </td>
                </tr>
                <tr class="px-6 py-3">
                    <th
                        class="px-6 py-3 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        ロゴ
                    </th>
                    <td class="px-6 py-3">
                        @if ($company->logo)
                        <img src="{{ \Storage::url($company->logo) }}" style="width: 100px" />
                        @else
                        未登録
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</x-app-layout>
