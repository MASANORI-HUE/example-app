<?php

namespace App\Http\Controllers\Auth\Logout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // ログイン情報を破棄する
        Auth::logout();

        // セッションを無効化する（セッションに保存されたデータをすべて削除）
        $request->session()->invalidate();

        // CSRFトークンを再生成する（セキュリティ対策）
        $request->session()->regenerateToken();

        return redirect('/tweet');
    }
}
