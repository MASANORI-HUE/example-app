<?php

use App\Models\User;

it('ログインできること', function () {
    $user = User::factory()->create(); // テスト用のユーザーを作成する

    $page = visit('/login')
        ->fill('email', $user->email) // メールアドレスを入力する
        ->fill('password', 'password') // パスワードを入力する
        ->submit() // フォームを送信する
        ->assertPathIs('/tweet') // tweetに遷移したことを確認する
        ->assertSee('つぶやきアプリ'); // ページ内に「つぶやきアプリ」が表示されていることの確認
});
