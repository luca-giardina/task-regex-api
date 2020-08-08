<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function recursion(Request $request) {
        return [
            'string' => 'cba'
        ];
    }
}
