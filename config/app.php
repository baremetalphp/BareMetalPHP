<?php

use BareMetalPHP\Support\Facades\App;
use BareMetalPHP\Support\Facades\Route;
use BareMetalPHP\Support\Facades\DB;
use BareMetalPHP\Support\Facades\Session;
use BareMetalPHP\Support\Facades\Log;

return [
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