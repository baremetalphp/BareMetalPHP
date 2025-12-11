<?php

declare(strict_types=1);

use BareMetalPHP\Application;

// Note: Helper functions are autoloaded via Composer (vendor/autoload.php)
// which should be required before this file (typically in index.php)

$app = new Application();

// Set global instance for helper functions
Application::setInstance($app);

// Bind the app itself into the container
$app->instance(Application::class, $app);

// Register service providers from providers.php
$providersFile = __DIR__ . '/providers.php';
if (file_exists($providersFile)) {
    $providers = require $providersFile;
    $app->registerProviders($providers);
}

// Boot all registered providers (this will load .env, config files, and register ConfigRepository)
$app->boot();

return $app;
