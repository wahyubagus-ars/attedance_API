<?php

namespace App\Utils;

use Hamcrest\Arrays\IsArray;
use phpDocumentor\Reflection\Types\Integer;

class ResponseApi {

    static function successResponse($data, $message, $status){
        $responseBody = [
            'success' => true,
        ];
        if($data) $responseBody['data'] = $data;
        if($message) $responseBody['message'] = $message;

        return response()->json($responseBody, $status);
    }

}