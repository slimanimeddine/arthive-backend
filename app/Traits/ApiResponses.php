<?php

namespace App\Traits;

trait ApiResponses
{
    protected function success(string $message, $data = null, int $statusCode = 200)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }

    protected function error(string $message, int $statusCode = 400)
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }
}
