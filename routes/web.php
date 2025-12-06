<?php

declare(strict_types=1);

use BareMetalPHP\Routing\Router;
use BareMetalPHP\View\View;

return function (Router $router): void {
    $router->get('/', function () {
        return View::make('welcome');
    });
};

