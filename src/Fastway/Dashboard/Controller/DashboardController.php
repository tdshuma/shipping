<?php

declare(strict_types=1);

namespace Fastway\Dashboard\Controller;

use Laminas\Diactoros\Response;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DashboardController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $templates = new Engine(__DIR__ . '/../View');
        $response = new Response();

        $response->getBody()->write($templates->render('dashboard', ['name' => '.']));
        return $response;
    }
}
