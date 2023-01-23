<x-app-layout>
    <div class="py-6 px-8 ml-56 text-white">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
        @endif
        <form method="POST" action="{{ route('admin.industry.update', $industries->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">業界名</label>
                <input type="text" name="name" id="name" value="{{ old('name', $industries) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="業界名" required>
            </div>
            <a href="{{ route('admin.industry.index') }}"
                class="inline-block text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">戻る</a>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">更新</button>
        </form>
    </div>
</x-app-layout>
