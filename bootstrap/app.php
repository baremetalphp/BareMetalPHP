<?php

declare(strict_types=1);

// Load Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

use BareMetalPHP\Application;


$app = new Application();

// Set as global instance so it can be accessed via Application::getInstance()
Application::setInstance($app);

// Register service providers
$providersFile = __DIR__ . '/providers.php';
if (file_exists($providersFile)) {
    $providers = require $providersFile;
    $app->registerProviders($providers);
}

// Register ErrorHandler
$app->singleton(\BareMetalPHP\Exceptions\ErrorHandler::class, function () {
    return new \BareMetalPHP\Exceptions\ErrorHandler();
});

// Boot all registered providers
$app->boot();

return $app;

