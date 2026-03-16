<?php

declare(strict_types=1);

use Fastway\ParcelTracking\Api\ParcelTrackingApi;
use Fastway\ParcelTracking\Dao\ParcelTrackingDao;
use Fastway\ParcelTracking\Model\Parcel;
use Fastway\ParcelTracking\Model\ParcelTrackingRequest;
use Fastway\ParcelTracking\Repo\ParcelTrackingRepo;
use PHPUnit\Framework\TestCase;

final class ParcelTrackingRepoTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        $response = file_get_contents(__DIR__ . '/../../mocks/parcel_tracking.json');
        $data = (array)json_decode($response);
        $dataResponse = Parcel::fromJson((array)$data['result'][1]);
        $api = $this->createStub(ParcelTrackingApi::class);
        $dao = $this->createStub(ParcelTrackingDao::class);

        $api
            ->method('getParcelDetails')
            ->willReturn([$dataResponse]);
        $dao
            ->method('getParcelDetails')
            ->willReturn([$dataResponse]);

        $repo = new ParcelTrackingRepo(
            $api,
            $dao
        );

        try {
            $results = $repo->getParcelDetails(
                new ParcelTrackingRequest(
                    'test'
                )
            );
            $this->assertSame(
                $dataResponse->labelNumber,
                $results[0]->labelNumber
            );
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
