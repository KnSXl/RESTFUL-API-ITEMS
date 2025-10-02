<?php

namespace App\Traits;

trait ResponseTrait
{
    public function successResponse($message, $data, $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function errorResponse($message, $code = 404)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}
