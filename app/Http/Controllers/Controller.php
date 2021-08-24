<?php

namespace App\Http\Controllers;

use App\Traits\HasApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function respond($data, $statusCode = 200, $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }

    /**
     * Respond with created.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondCreated($data)
    {
        return $this->respond($data, 201);
    }

    /**
     * Respond with success.
     *
     * @param $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondSuccess($data, $message = '', $statusCode = 200)
    {
        return $this->respond([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], $statusCode);
    }
    /**
     * Respond with error.
     *
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondError($message = 'Bad request', $statusCode = 400)
    {
        return $this->respond([
            'success' => false,
            'errors' => [
                'message' => $message
            ]
        ], $statusCode);
    }

    /**
     * Respond with no content.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondNoContent()
    {
        return $this->respondSuccess(null, 204);
    }

    /**
     * Respond with unauthorized.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondUnauthorized($message = 'Unauthorized')
    {
        return $this->respondError($message, 401);
    }

    /**
     * Respond with forbidden.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondForbidden($message = 'Forbidden')
    {
        return $this->respondError($message, 403);
    }

    /**
     * Respond with not found.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondNotFound($message = 'Not Found')
    {
        return $this->respondError($message, 404);
    }

    /**
     * Respond with internal error.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondInternalError($message = 'Internal Error')
    {
        return $this->respondError($message, 500);
    }
}
