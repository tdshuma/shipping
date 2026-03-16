<?php

declare(strict_types=1);

use Fastway\ParcelQuote\Dao\ParcelQuoteDao;
use Fastway\ParcelQuote\Model\ParcelQuote;
use PHPUnit\Framework\TestCase;

final class ParcelQuoteDaoTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        $response = file_get_contents(__DIR__ . '/../../mocks/parcel_quote.json');
        $data = (array)json_decode($response);
        $dataResponse = ParcelQuote::fromJson((array)$data['result']);
        $db = new SQLite3(':memory:');
        $db->exec('CREATE TABLE cache_storage(id INTEGER PRIMARY KEY AUTOINCREMENT, time VARCHAR(64), key VARCHAR(64), data TEXT);');
        $dao = new ParcelQuoteDao($db);

        try {
            $dao->saveParcelQuote(
                $dataResponse->toJson()
            );
            $results = $dao->getParcelQuote();
            $this->assertSame(
                $dataResponse->pickfranchise,
                $results->pickfranchise
            );
        } catch (\Throwable $th) {
            error_log($th->getTraceAsString());
        }
    }
}
