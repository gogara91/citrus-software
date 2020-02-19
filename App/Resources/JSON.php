<?php

namespace App\Resources;

class JSON {
    public static function response($message = '', $data = [], $code = 200)
    {
        header('HTTP/1.0 ' . $code);
        header('Accept: application/json');
        header('Content-Type: application/json');
        echo json_encode(['message' => $message, 'data' => $data]);

    }
}