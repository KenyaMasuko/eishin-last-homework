<p class="mb-4">{{ $company->name }}様</p>

<p class="mb-4">
    下記求人に応募がありましたのでご確認ください。
</p>

<p>詳細内容
<dl>
    <dt>応募者</dt>
    <dd>{{ $user->name }}</dd>
    <dt>募集タイトル</dt>
    <dd>{{ $offer->title }}</dd>
    <dt>募集詳細</dt>
    <dd>{{ $offer->description }}</dd>
</dl>
</p>
