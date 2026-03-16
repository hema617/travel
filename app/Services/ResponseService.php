<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ResponseService
{
    /**
     * Success response
     *
     * @param string $message
     * @param array $data
     * @param int $statusCode
     * @param bool $status
     * @return JsonResponse
     */
    public function success(string $message,  $data = [], int $statusCode = 200, bool $status = true): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'status_code' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * Error response
     *
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function error(string $message, int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'status' => false,
            'status_code' => $statusCode,
            'message' => $message,
        ], $statusCode);
    }
}