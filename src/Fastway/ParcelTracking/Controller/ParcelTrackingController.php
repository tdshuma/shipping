<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Controller;

use Fastway\ParcelTracking\Api\ParcelTrackingApi;
use Fastway\ParcelTracking\Dao\ParcelTrackingDao;
use Fastway\ParcelTracking\Model\ParcelTrackingRequest;
use Fastway\ParcelTracking\Repo\ParcelTrackingRepo;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ParcelTrackingController
{

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $body = (array)json_decode($request->getBody()->getContents());
        $repo = new ParcelTrackingRepo(
            new ParcelTrackingApi,
            new ParcelTrackingDao,
        );

        try {
            $results = $repo->getParcelDetails(
                new ParcelTrackingRequest($body['trackingNumber'])
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
