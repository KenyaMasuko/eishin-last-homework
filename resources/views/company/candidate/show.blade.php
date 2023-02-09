<style>
    /* 他人のコメントの吹き出し */
    .other::before {
        content: "";
        position: absolute;
        top: 90%;
        left: -15px;
        margin-top: -30px;
        border: 5px solid transparent;
        border-right: 15px solid rgb(187 247 208 / var(--tw-bg-opacity));
    }

    /* 自身のコメントの吹き出し */
    .self::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 100%;
        margin-top: -15px;
        border: 3px solid transparent;
        border-left: 9px solid rgb(187 247 208 / var(--tw-bg-opacity));
    }
</style>
<x-app-layout>
    <div class="py-6 px-8 ml-56 ">
        <div class="my-4 p-4 rounded-lg bg-white">
            <ul>
                @foreach ($chats as $chat)
                <p class="text-xs @if($chat->send_by === 1 ) text-right @endif">
                    {{$chat->created_at}} @
                    @if ($chat->send_by === 1 )
                    {{$offer->companyInfo->name}}
                    @else
                    {{$chat->user->name}}
                    @endif
                </p>
                <li
                    class="w-max mb-3 p-2 rounded-lg bg-green-200 relative @if($chat->send_by === 1) self ml-auto @else other @endif">
                    {{$chat->message}}
                </li>
                @endforeach
            </ul>
        </div>
        <form class="my-4 py-2 px-4 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow"
            action="{{ route('company.chat.send', ['user_id' => $user_id, 'offer_id' => $offer->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="send_by" value="1">
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto" type="text" name="message"
                placeholder="Input message." maxlength="200">
            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white"
                type="submit">Send</button>
        </form>
    </div>
</x-app-layout>
