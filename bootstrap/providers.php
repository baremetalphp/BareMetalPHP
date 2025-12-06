<?php

declare(strict_types=1);

/**
 * Service Providers Configuration
 */

return [
    // Framework core providers
    \BareMetalPHP\Providers\ConfigServiceProvider::class,
    \BareMetalPHP\Providers\DatabaseServiceProvider::class,
    \BareMetalPHP\Providers\ViewServiceProvider::class,
    \BareMetalPHP\Providers\RoutingServiceProvider::class,
    \BareMetalPHP\Providers\HttpServiceProvider::class,
    
    // Application providers
    \App\Providers\AppServiceProvider::class,
];

