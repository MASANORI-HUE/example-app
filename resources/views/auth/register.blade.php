<x-layout title="ユーザー登録 | つぶやきアプリ">
    <x-layout.single>
        <x-auth.card title="ユーザー登録">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <x-form.input
                    type="text"
                    name="name"
                    label="お名前"
                    placeholder="お名前を入力"
                    required
                    autofocus
                />
                <x-form.input
                    type="email"
                    name="email"
                    label="メールアドレス"
                    placeholder="メールアドレスを入力"
                    required
                />
                <x-form.input
                    type="password"
                    name="password"
                    label="パスワード"
                    placeholder="パスワードを入力"
                    required
                />
                <x-form.input
                    type="password"
                    name="password_confirmation"
                    label="パスワード確認"
                    placeholder="パスワードを再入力"
                    required
                />
                <div class="flex justify-center mt-8 mb-6">
                    <x-element.button>
                        登録
                    </x-element.button>
                </div>
            </form>

            <div class="text-center">
                <x-auth.link href="{{ route('login') }}">
                    すでにアカウントをお持ちの方はこちら
                </x-auth.link>
            </div>
        </x-auth.card>
    </x-layout.single>
</x-layout>