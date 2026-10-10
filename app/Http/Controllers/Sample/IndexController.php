<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function show()
    {
        return 'Hello';
    }

    public function showid($id)
    {
        return "Hello {$id}";
    }
}
