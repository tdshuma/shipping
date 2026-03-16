<?php

declare(strict_types=1);

namespace Fastway;

use Fastway\Core\Model\Environment;
use Fastway\Dashboard\Controller\DashboardController;
use Fastway\ParcelTracking\Controller\ParcelTrackingController;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;

function main(Environment $environment): void
{
    $request = ServerRequestFactory::fromGlobals(
        $_SERVER,
        $_GET,
        $_POST,
        $_COOKIE,
        $_FILES
    );
    $router = new Router;

    switch ($environment) {
        case Environment::PROD:
            break;

        case Environment::PRE:
            break;

        case Environment::TEST:
            break;

        case Environment::DEV:
            $router->map('GET', '/', DashboardController::class);
            $router->map('POST', '/parcel-tracking', ParcelTrackingController::class);
            break;

        default:
            throw new \Exception('Environment not set');
            break;
    }

    (new SapiEmitter)->emit($router->dispatch($request));
}
