<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class HogeController extends Controller
{

    public function hoge(Request $request): JsonResponse
    {
        return new JsonResponse([
            'status' => 'ok',
            'message' => 'hoge'
        ]);
    }
}
