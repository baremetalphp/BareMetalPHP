<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Go Application Server
    |--------------------------------------------------------------------------
    |
    | This flag controls whether commands like `go:serve` should run.
    | It does NOT affect plain PHP-FPM usage.
    |
    */

    'enabled' => env('APPSERVER_ENABLED', false),

    /*
    |--------------------------------------------------------------------------
    | Worker Pool Settings
    |--------------------------------------------------------------------------
    |
    | These values map directly to the JSON fields in go_appserver.json and
    | to the Go AppServerConfig type (fast/slow workers, hot reload).
    |
    */

    'fast_workers' => (int) env('APPSERVER_FAST_WORKERS', 4),
    'slow_workers' => (int) env('APPSERVER_SLOW_WORKERS', 2),
    'hot_reload'   => (bool) env('APPSERVER_HOT_RELOAD', true),

    /*
    |--------------------------------------------------------------------------
    | Static Asset Rules
    |--------------------------------------------------------------------------
    |
    | These rules are passed directly to go_appserver.json and consumed by
    | the Go server to serve static files before hitting PHP workers.
    |
    */

    'static' => [
        ['prefix' => '/assets/', 'dir' => 'public/assets'],
        ['prefix' => '/build/',  'dir' => 'public/build'],
        ['prefix' => '/css/',    'dir' => 'public/css'],
        ['prefix' => '/js/',     'dir' => 'public/js'],
        ['prefix' => '/images/', 'dir' => 'public/images'],
        ['prefix' => '/img/',    'dir' => 'public/img'],
    ],

];
