<?php

declare(strict_types=1);

use Fastway\ParcelQuote\Api\ParcelQuoteApi;
use Fastway\ParcelQuote\Model\ParcelQuote;
use Fastway\ParcelQuote\Model\ParcelQuoteRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class ParcelQuoteApiTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        putenv('API_SECRET_KEY=test');
        $response = file_get_contents(__DIR__ . '/../../mocks/parcel_quote.json');
        $mock = new MockHandler([
            new Response(200, [], $response),
        ]);
        $api = new ParcelQuoteApi(
            new Client([
                'handler' => HandlerStack::create($mock)
            ])
        );

        try {
            $results = $api->getParcelQuote(
                new ParcelQuoteRequest(
                    'test', 'test'
                )
            );
            $data = (array)json_decode($response);
            $this->assertSame(
                ParcelQuote::fromJson((array)$data['result'])->pickfranchise,
                $results->pickfranchise
            );
        } catch (\Throwable $th) {
            print($th);
        }
    }
}
