<x-layout title="ログイン | つぶやきアプリ">
    <x-layout.single>
        <x-auth.card title="ログイン">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <x-form.input
                    type="email"
                    name="email"
                    label="メールアドレス"
                    placeholder="メールアドレスを入力"
                    required
                    autofocus
                />
                
                <x-form.input
                    type="password"
                    name="password"
                    label="パスワード"
                    placeholder="パスワードを入力"
                    required
                />
                
                <div class="flex justify-center mt-8 mb-6">
                    <x-element.button>
                        ログイン
                    </x-element.button>
                </div>
            </form>
            <div class="text-center">
                <x-auth.link href="{{ route('register') }}">
                    アカウントをお持ちでない方はこちら
                </x-auth.link>
            </div>
        </x-auth.card>
    </x-layout.single>
</x-layout>