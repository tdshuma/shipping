<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Repo;

use Exception;
use Fastway\ParcelTracking\Api\ParcelTrackingApi;
use Fastway\ParcelTracking\Dao\ParcelTrackingDao;
use Fastway\ParcelTracking\Model\ParcelTracking;
use Fastway\ParcelTracking\Model\ParcelTrackingRequest;

final class ParcelTrackingRepo
{
    public function __construct(private ParcelTrackingApi $api, private ParcelTrackingDao $dao) {}

    function getParcelDetails(ParcelTrackingRequest $request): ParcelTracking
    {
        try {
            return $this->dao->getParcelDetails($request);
        } catch (Exception $error) {
            try {
                return $this->api->getParcelDetails($request);
            } catch (Exception $error) {
                throw ($error);
            }
        }
    }
}
