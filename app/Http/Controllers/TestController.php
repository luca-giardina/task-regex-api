<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class TestController extends Controller
{
    public function recursion(Request $request) {
        $data = $request->validate([
            'string' => 'required|string'
        ]);

        return [
            'string' => $this->reverseString(str_split($data["string"]))
        ];
    }

    public function palindrimes(Request $request) {
        $data = $request->validate([
            'string' => 'required|string'
        ]);

        return [
            'result' => $this->palindrome($data["string"])
        ];
    }

    private function palindrome($string) {
        $string = strtolower(preg_replace("/[^a-zA-Z]+/", "", $string));
        return $string == $this->reverseString(str_split($string));
    }

    private function reverseString($aStr) {
        if(count($aStr) == 1) {
            return $aStr[0];
        }

        return $this->reverseString(array_splice($aStr, 1)) . $aStr[0];
    }
}
