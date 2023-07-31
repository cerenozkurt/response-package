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

    public function responseBadRequest($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 400);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'bad request'
        ], 400);
    }

    public function responseConflict($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 409);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'conflict'
        ], 409);
    }

    public function responsePayloadTooLarge($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 413);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'payload too large'
        ], 413);
    }

    public function responseTooManyRequests($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 429);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'too many requests'
        ], 429);
    }

    public function responseInternalServer($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 500);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'internal server error'
        ], 500);
    }

    public function responseNotImplemented($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 501);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'not implemented'
        ], 501);
    }

    public function responseDataWithPagination($paginateData, $dataName = null, $message = null)
    {
        if ($dataName) {
            $datas = [$dataName => $paginateData->items()];
        } else {
            $datas = $paginateData->items();
        }
        $pagination = [
            'links' => [
                'first' => $paginateData->onFirstPage(),
                'last' => $paginateData->onLastPage(),
                'prev' => $paginateData->previousPageUrl(),
                'next' => $paginateData->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $paginateData->currentPage(),
                'from' => $paginateData->firstItem(),
                'to' => $paginateData->lastItem(),
                'per_page' => $paginateData->perPage(),
                'total' => $paginateData->total(),
            ],
        ];

        if ($message != null) {
            return new JsonResponse([
                'result' => true,
                'message' => $message,
                'data' => $datas,
                'page' => $pagination

            ], 200);
        }
        return new JsonResponse([
            'result' => true,
            'data' => $datas,
            'page' => $pagination

        ], 200);
    }

    public function responseInvalidToken($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 498);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'invalid token'
        ], 498);
    }

    public function responseErrorMessage($message, $statusCode = 400)
    {
        return new JsonResponse([
            'result' => false,
            'message' => $message
        ], $statusCode);
    }
}
