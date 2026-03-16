<?php

declare(strict_types=1);

use Fastway\ParcelQuote\Api\ParcelQuoteApi;
use Fastway\ParcelQuote\Dao\ParcelQuoteDao;
use Fastway\ParcelQuote\Model\ParcelQuote;
use Fastway\ParcelQuote\Model\ParcelQuoteRequest;
use Fastway\ParcelQuote\Repo\ParcelQuoteRepo;
use PHPUnit\Framework\TestCase;

final class ParcelQuoteRepoTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        $response = file_get_contents(__DIR__ . '/../../mocks/parcel_quote.json');
        $data = (array)json_decode($response);
        $dataResponse = ParcelQuote::fromJson((array)$data['result']);
        $api = $this->createStub(ParcelQuoteApi::class);
        $dao = $this->createStub(ParcelQuoteDao::class);

        $api
            ->method('getParcelQuote')
            ->willReturn($dataResponse);
        $dao
            ->method('getParcelQuote')
            ->willReturn($dataResponse);

        $repo = new ParcelQuoteRepo(
            $api,
            $dao
        );

        try {
            $results = $repo->getParcelQuote(
                new ParcelQuoteRequest(
                    'test', 'test'
                )
            );
            $this->assertSame(
                $dataResponse->pickfranchise,
                $results->pickfranchise
            );
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
