<?php

declare(strict_types=1);

use Fastway\ParcelTracking\Api\ParcelTrackingApi;
use Fastway\ParcelTracking\Model\Parcel;
use Fastway\ParcelTracking\Model\ParcelTrackingRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class ParcelTrackingApiTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        putenv('API_SECRET_KEY=test');
        $response = file_get_contents(__DIR__ . '/../../mocks/parcel_tracking.json');
        $mock = new MockHandler([
            new Response(200, [], $response),
        ]);
        $api = new ParcelTrackingApi(
            new Client([
                'handler' => HandlerStack::create($mock)
            ])
        );

        try {
            $results = $api->getParcelDetails(
                new ParcelTrackingRequest(
                    'test'
                )
            );
            $data = (array)json_decode($response);
            $this->assertSame(
                Parcel::fromJson((array)$data['result'][1])->pickupFranchise,
                $results[1]->pickupFranchise
            );
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
