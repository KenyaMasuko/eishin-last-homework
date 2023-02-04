<x-app-layout>
    <div class="max-w-3xl mx-auto mt-8 overflow-hidden bg-white shadow sm:rounded-lg">
        あなたは下記の求人に応募しています
        <ul>
            @foreach ($applications as $application)
            {{ $application->title }}
            @endforeach
            <li></li>
        </ul>
    </div>

</x-app-layout>
