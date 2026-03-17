<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Repo;

use Fastway\ParcelTracking\Api\ParcelTrackingApi;
use Fastway\ParcelTracking\Dao\ParcelTrackingDao;
use Fastway\ParcelTracking\Model\Parcel;
use Fastway\ParcelTracking\Model\ParcelTrackingRequest;

final class ParcelTrackingRepo
{
    public function __construct(private ParcelTrackingApi $api, private ParcelTrackingDao $dao) {}

    function getParcelDetails(ParcelTrackingRequest $request): array
    {
        try {
            return
                array_map(
                    fn($item) => Parcel::fromJson((array)$item),
                    $this->dao->getParcelDetails($request)
                );
        } catch (\Throwable $error) {
            try {
                $results = $this->api->getParcelDetails($request);
                $this->dao->saveParcelDetails(
                    $request,
                    array_map(
                        fn($item) => $item->toJson(),
                        $results
                    )
                );
                return $results;
            } catch (\Throwable $error) {
                throw $error;
            }
        }
    }
}
