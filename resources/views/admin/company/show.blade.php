<x-app-layout>
    <div class="py-6 px-8 ml-56 text-white">
        <div class="flex items-center justify-between">
            <h1 class="text-4xl font-extrabold dark:text-white">会社詳細</h1>
            <a href="{{ route('admin.company.index') }}"
                class="inline-block text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">戻る</a>
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
                        業界
                    </th>
                    <td class="px-6 py-3">
                        {{ $company->industry->name ?? '未登録です' }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</x-app-layout>
