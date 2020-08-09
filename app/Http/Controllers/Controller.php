<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $aError = [
        "500" => "Internal Error",
        "422" => "Invalid JSON",
    ];

    protected function validateString($request) {
        return $request->validate([
            'string' => 'required|string'
        ]);
    }
}
