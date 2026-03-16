<?php

declare(strict_types=1);

namespace Fastway\ParcelQuote\Controller;

use Fastway\ParcelQuote\Model\ParcelQuoteRequest;
use Fastway\ParcelQuote\Repo\ParcelQuoteRepo;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ParcelQuoteController
{
    public function __construct(private ParcelQuoteRepo $repo) {}

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getParsedBody();

        try {
            $results = $this->repo->getParcelQuote(
                new ParcelQuoteRequest(
                    $body['pick_up'],
                    $body['drop_off']
                )
            );
            $response = new Response();
            $response->getBody()->write(
                json_encode(
                    $results->toJson(),
                )
            );

            return $response;
        } catch (\Exception $error) {
            $response = new Response($error->getMessage(), 401);
            return $response;
        }
    }
}
