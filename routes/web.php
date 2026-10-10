<?php

use App\Http\Controllers\Auth\Login\PostController;
use App\Http\Controllers\Tweet\CreateController;
use App\Http\Controllers\Tweet\DeleteController;
use App\Http\Controllers\Tweet\IndexController;
use App\Http\Controllers\Tweet\Update\PutController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/sample/{id}', [\App\Http\Controllers\Sample\IndexController::class, 'showid']);
// Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');
// Route::post('/tweet', \App\Http\Controllers\Tweet\CreateController::class)->name('tweet.create');
// Route::get('/tweet/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index');
// Route::put('/tweet/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)->name('tweet.update.put');
// Route::delete('/tweet/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)->name('tweet.delete');
// Route::get('/register', \App\Http\Controllers\Auth\Register\IndexController::class)->name('register');
// Route::post('/register', \App\Http\Controllers\Auth\Register\PostController::class);
// Route::get('/login', \App\Http\Controllers\Auth\Login\IndexController::class)->name('login');
// Route::post('/login', \App\Http\Controllers\Auth\Login\PostController::class);

Route::get('/', function () {
    return redirect()->route('tweet.index');
});

// 未ログインユーザー向けのルート
Route::middleware('guest')->group(function () {
    Route::get('/login', App\Http\Controllers\Auth\Login\IndexController::class)
        ->name('login');
    Route::post('/login', PostController::class);

    Route::get('/register', App\Http\Controllers\Auth\Register\IndexController::class)
        ->name('register');
    Route::post('/register', App\Http\Controllers\Auth\Register\PostController::class);
});

// ログアウト（認証済みユーザーのみ）
Route::post('/logout', App\Http\Controllers\Auth\Logout\PostController::class)
    ->middleware('auth')
    ->name('logout');

// つぶやき一覧（誰でもアクセス可能）
Route::get('/tweet', IndexController::class)
    ->name('tweet.index');

// 認証が必要なルート
Route::middleware('auth')->group(function () {
    Route::post('/tweet', CreateController::class)
        ->name('tweet.create');
    // 編集・削除のルートは後で追加
    Route::get('/tweet/{tweetId}', App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index');
    Route::put('/tweet/{tweetId}', PutController::class)->name('tweet.update.put');
    Route::delete('/tweet/{tweetId}', DeleteController::class)->name('tweet.delete');
});
