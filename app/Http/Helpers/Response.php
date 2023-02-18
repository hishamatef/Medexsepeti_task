<?php

/**
 * Manage response to be returned in json fomate.
 */

/* succes response  */
function successResponse($message = null)
{
    return response()->json(['status' => 'success', 'message' => $message], 200);
}

function successResponseCreated($message = null)
{
    return response()->json(['status' => 'success', 'message' => $message], 201);
}

/* success response with data **/
function successResponseWithData($data, $message = null)
{
    $data = [
        'status' => 'success',
        'message' => $message,
        'data' => $data,
    ];

    return response()->json($data, 200);
}

/* succes response  */
function errorResponse($message = null)
{
    return response()->json(['status' => 'error', 'message' => $message], 500);
}

function badRequest($message = null)
{
    return response()->json(['status' => 'error', 'message' => $message], 400);
}

function notAuthorized($message = 'Unauthorized')
{
    return response()->json(['status' => 'error', 'message' => $message], 401);
}

/* success response with data */
function errorResponseWithData($data, $message = null)
{
    $data = [
        'status' => 'success',
        'message' => $message,
        'data' => $data,
    ];

    return response()->json($data, 500);
}

/* validation errors */
function validationErrors($errors, $message = null)
{
    $data = [
        'status' => 'validations',
        'message' => (empty($message)) ? __('response.invalid_data') : $message,
        'errors' => $errors,
    ];

    return response()->json($data, 422);
}
function forbiddenErrors($message = null)
{
    $data = [
        'status' => 'validations',
        'message' => (empty($message)) ? __('response.invalid_data') : $message,
    ];

    return response()->json($data, 423);
}

function validationErrorsWithMessages($errors)
{
    $data = [
        'status' => 'validations',
        'message' => $errors,
        'errors' => 'Data validation error',
    ];

    return response()->json($data, 422);
}


function notFoundResponse($message)
{
    return response()->json(['status' => 'error', 'message' => $message], 404);
}

//this custom response for mobile
function customValidationResponse($message = null)
{
    return response()->json(['status' => 'error', 'message' => $message], 200);
}

// NEW SIGNATURE API

function _ReturnJsonResponse($status, $message = '', $errors = [], $data = [], $statusResponse = 200)
{
    return response()->json(
        [
            'status' => $status,
            'message' => $message,
            'errors' => $errors,
            'data' => $data,
        ],
        $statusResponse
    );
}

/* success response with error_code */
function responseWithErrorCode($errorCode, $message = null)
{
    $data = [
        'status' => 'success',
        'message' => $message,
        'error_code' => $errorCode,
    ];

    return response()->json($data, 200);
}

/**
 * Response on paginate
 *
 * @param array $result
 * @param integer $code
 * @return Response
 */
function successResponseWithPaginatedData($result, $append = null, $code = 200)
{
    return response()->json([
        'status' => 'success',
        'message' => '',
        'hasMorePages' => $result->hasMorePages(),
        'nextPageUrl' => $result->nextPageUrl(),
        'total' => $result->total(),
        'perPage' => $result->perPage(),
        'currentPage' => $result->currentPage(),
        'data' => ($append != null) ? ['append' => $append, 'result' => $result->items()] : $result->items(),
    ], $code);
}
