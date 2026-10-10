@props([
    'tweet'
])
<div class="p-4">
    <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
        @method('PUT')
        @csrf
        @if (session('feedback.success'))
            <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
        @endif
        <x-form.textarea
            name="tweet"
            rows="3"
            placeholder="つぶやきを入力"
            helpText="140文字まで"
            value="{{ $tweet->content }}"
            required
        />
        <div class="flex flex-wrap justify-end mt-4">
            <x-element.button>
                編集
            </x-element.button>
        </div>
    </form>
</div>