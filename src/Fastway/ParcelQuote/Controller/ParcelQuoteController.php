<?php

declare(strict_types=1);

namespace Fastway\ParcelQuote\Controller;

use Fastway\ParcelQuote\Api\ParcelQuoteApi;
use Fastway\ParcelQuote\Dao\ParcelQuoteDao;
use Fastway\ParcelQuote\Model\ParcelQuoteRequest;
use Fastway\ParcelQuote\Repo\ParcelQuoteRepo;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ParcelQuoteController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $body = (array)json_decode($request->getBody()->getContents());
        $repo = new ParcelQuoteRepo(
            new ParcelQuoteApi,
            new ParcelQuoteDao,
        );

        try {
            $results = $repo->getParcelQuote(
                new ParcelQuoteRequest(
                    'JNB', // $body['pick_up'],
                    $body['drop_off'],
                    $body['postal_code'],
                    $body['parcel_weight'],
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
            $response = new Response(status: 500);
            $response->getBody()->write(json_encode(['message' => $error->getMessage()]));
            return $response;
        }
    }
}
