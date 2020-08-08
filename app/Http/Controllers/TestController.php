<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Helpers;

class TestController extends Controller
{
    public function recursion(Request $request) {
        $data = $this->validateString($request);

        return [
            'string' => Helpers::reverseString(str_split($data["string"]))
        ];
    }

    public function palindrimes(Request $request) {
        $data = $this->validateString($request);

        return [
            'result' => Helpers::palindrome($data["string"])
        ];
    }

    public function wordCount(Request $request) {
        $data = $this->validateString($request);

        return [
            'result' => Helpers::countWords($data["string"])
        ];
    }
}
