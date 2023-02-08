<x-app-layout>
    <div class="max-w-3xl mx-auto mt-8 overflow-hidden bg-white shadow sm:rounded-lg">
        <form action="{{ route('user.apply.store', ['offer_id' => $offer->id]) }}" method="POST"
            class="px-4 py-5 sm:gap-4 sm:px-6">
            @csrf
            <input type="hidden" name="offer_value" value="{{ $offer->id }}">
            <div class="text-center">
                下記の求人に応募しますか？
            </div>
            <div class="flex justify-center gap-5 mt-4">
                <a href="{{ route('user.offers.index'), $offer->id }}"
                    class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">戻る</a>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">応募する</button>
            </div>
        </form>
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $offer->title }}</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $offer->companyInfo->name }}の募集</p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">会社名</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $offer->companyInfo->name }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">代表者名</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $offer->companyInfo->ceo_name ??
                        '未登録'
                        }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">業界</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $offer->companyInfo->industry->name
                        ??
                        '未登録'
                        }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">詳細</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $offer->description }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">特徴</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <ul>
                            @foreach ($offer->features as $feature)
                            <li>{{ $feature->feature }}</li>
                            @endforeach
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </div>

</x-app-layout>
