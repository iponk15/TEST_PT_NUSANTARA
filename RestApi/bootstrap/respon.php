<?php

function res($status, $message, $code, $data = null){
    $response = [
        "status"  => [
            "code"     => $code,
            "response" => ($status == FALSE ? "Erorr" : "Success" ),
            'message'  => $message,
        ],
        "result" => $data
    ];

    return response()->json($response);
}