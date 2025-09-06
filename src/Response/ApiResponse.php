<?php

namespace Rdeni\Lux\Response;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * @param string
     * @param array
     * @param int
     *
     * @return JsonResponse
     */
    public static function success(string $message = '', array $data = [], int $code = 200) : JsonResponse
    {
        // Prepare Response
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, $code);
    }

    /**
     * @param string
     * @param array
     * @param int
     */
    public static function failed(string $message = '', array $errors = [], int $code = 429) : JsonResponse
    {
        // Prepare resoponse
        $response = [
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ];

        return response()->json($response, $code);
    }
}