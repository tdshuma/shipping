<?php

declare(strict_types=1);

use Fastway\ParcelTracking\Dao\ParcelTrackingDao;
use Fastway\ParcelTracking\Model\Parcel;
use Fastway\ParcelTracking\Model\ParcelTrackingRequest;
use PHPUnit\Framework\TestCase;

final class ParcelTrackingDaoTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        $response = file_get_contents(__DIR__ . '/../../mocks/parcel_tracking.json');
        $data = (array)json_decode($response);
        $dataResponse = Parcel::fromJson((array)$data['result'][1]);
        $db = new SQLite3(':memory:');
        $db->exec('CREATE TABLE cache_storage(id INTEGER PRIMARY KEY AUTOINCREMENT, time VARCHAR(64), key VARCHAR(64), data TEXT);');
        $dao = new ParcelTrackingDao($db);
        $request = new ParcelTrackingRequest('test');

        try {
            $dao->saveParcelDetails(
                $request,
                $dataResponse->toJson()
            );
            $results = $dao->getParcelDetails($request);
            $this->assertSame(
                $dataResponse->labelNumber,
                $results[0]->labelNumber
            );
        } catch (\Throwable $th) {
            error_log($th->getTraceAsString());
        }
    }
}
