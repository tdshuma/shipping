<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Controller;

use Fastway\ParcelTracking\Model\ParcelTrackingRequest;
use Fastway\ParcelTracking\Repo\ParcelTrackingRepo;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ParcelTrackingController
{
    public function __construct(private ParcelTrackingRepo $repo) {}

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getParsedBody();

        try {
            $results = $this->repo->getParcelDetails(
                new ParcelTrackingRequest($body['tackingNumber'])
            );
            $response = new Response();
            $response->getBody()->write(
                json_encode(
                    array_map(
                        fn($item) => $item->toJson(),
                        $results
                    )
                )
            );

            return $response;
        } catch (\Exception $error) {
            $response = new Response($error->getMessage(), 401);
            return $response;
        }
    }
}
