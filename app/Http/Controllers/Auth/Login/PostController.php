<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        if (Auth::attempt($request->credentials())) {
            $request->session()->regenerate();

            return redirect()->intended('/tweet');
        }

        throw ValidationException::withMessages([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }
}
