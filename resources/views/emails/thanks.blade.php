<p class="mb-4">{{ $user->name }}様</p>

<p class="mb-4">
    ご応募ありがとうございました<br>
    下記の求人に応募いただきました。
</p>

<p>求人内容
<dl>
    <dt>募集タイトル</dt>
    <dd>{{ $offer->title }}</dd>
    <dt>募集詳細</dt>
    <dd>{{ $offer->description }}</dd>
    <dt>求人会社名</dt>
    <dd>{{ $company->name }}</dd>
</dl>
</p>
