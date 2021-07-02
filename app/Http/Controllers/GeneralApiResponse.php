<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralApiResponse extends Controller
{
    public static function success($message, $status, $data) {
        return response()->json([
            'message'=>$message,
            'status'=>$status,
            'data'=>$data
        ],200);
    }

    public static function error($message, $status, $error) {
        return response()->json([
            'message'=>$error,
            'status'=>$status,
            'data'=>null
        ],200);
    }
}
