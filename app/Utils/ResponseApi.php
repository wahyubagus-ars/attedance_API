<?php

namespace App\Utils;

use Hamcrest\Arrays\IsArray;
use phpDocumentor\Reflection\Types\Integer;

class ResponseApi {

    static function successResponse($data, $responseKey, $message, $status, $headers){
        $responseBody = [
            'success' => true,
            'response_key' => $responseKey
        ];
        if($data) $responseBody['data'] = $data;
        if($message) $responseBody['message'] = $message;

        $response = response()->json($responseBody, $status);

        if($headers){
            foreach($headers as $header_key => $value){
                $response->header($header_key, $value);
            }
        }

        return $response;
    }

    static function failedResponse($data, $responseKey, $message, $status){
        $responseBody = [
            'success' => false,
            'response_key' => $responseKey
        ];
        if($data) $responseBody['data'] = $data;
        if($message) $responseBody['message'] = $message;

        return response()->json($responseBody, $status);
    }

}