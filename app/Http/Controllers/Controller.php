<?php

namespace App\Http\Controllers;

use Framework\Http\Response;

abstract class Controller
{
    /**
     * Create a JSON response
     */
    protected function jsonResponse(array $data, int $status = 200): Response
    {
        return new Response(
            json_encode($data, JSON_PRETTY_PRINT),
            $status,
            ['Content-Type' => 'application/json']
        );
    }
}

