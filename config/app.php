<?php

use BareMetalPHP\Support\Facades\App;
use BareMetalPHP\Support\Facades\Route;
use BareMetalPHP\Support\Facades\DB;
use BareMetalPHP\Support\Facades\Session;
use BareMetalPHP\Support\Facades\Log;

return [
    'name' => env('APP_NAME', 'BareMetalPHP App'),
    'env' => env('APP_ENV', 'local'),
    'debug' => (bool) env('APP_DEBUG', true),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => 'UTC',
    'locale' => 'en',
    'aliases' => [
        // Core
        'App' => App::class,
        'Route' => Route::class,
        'DB' => DB::class,

        // Utilities
        'Session' => Session::class,
        'Log' => Log::class,
    ]
];