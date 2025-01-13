<?php

namespace Modules\DoctorAvailability\Shared\Traits;

trait ResponseJson
{
    /**
     * Return a success JSON response.
     *
     * @param  mixed  $data
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data = null, $message = 'Success', $statusCode = 200)
    {
        return response()->json(
            [
            'success' => true,
            'message' => $message,
            'data' => $data
            ], $statusCode
        );
    }

    /**
     * Return an error JSON response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @param  mixed  $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message = 'Error', $errors = null, $statusCode = 400)
    {
        return response()->json(
            [
            'success' => false,
            'message' => $message,
            'errors' => $errors
            ], $statusCode
        );
    }
}
