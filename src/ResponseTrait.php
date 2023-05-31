<?php

namespace CerenOzkurt\ResponseMessages;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    public function responseData($data, $message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => true,
                'message' => $message,
                'data' => $data
            ], 200);
        }
        return new JsonResponse([
            'result' => true,
            'data' => $data
        ], 200);
    }

    public function responseSuccess($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => true,
                'message' => $message,
            ], 200);
        }
        return new JsonResponse([
            'result' => true,
            'data' => 'successful'
        ], 200);
    }

    public function responseError($message = null, $status = 500)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message,
            ], $status);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'an error occurred'
        ], $status);
    }
    public function responseValidation($validation)
    {
        return new JsonResponse([
            'result' => false,
            'validation_error' => $validation
        ], 422);
    }

    public function responseDataNotFound($data_name = null)
    {
        if ($data_name != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $data_name . ' not found'
            ], 404);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'data not found'
        ], 404);
    }

    //Forbidden geçerli kimlik var ama kimlik sahibi işlem için yetkiye sahip değil 
    public function responseForbidden($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 403);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'no access permission'
        ], 403);
    }

    //Unauthorized geçersiz kimlik bilgisi
    public function responseUnauthorized($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 401);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'not authorized'
        ], 401);
    }

    public function responseTryCatch($message = null, $status = 500)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], $status);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'an error occurred'
        ], $status);
    }

    public function responseDataCount($data)
    {
        return new JsonResponse([
            'result'    => true,
            'count'      => count($data),
            'data'      => $data
        ], 200);
    }
}