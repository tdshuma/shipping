<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Dao;

use Fastway\Core\Dao\BaseDao;
use Fastway\ParcelTracking\Model\ParcelTracking;
use Fastway\ParcelTracking\Model\ParcelTrackingRequest;

final class ParcelTrackingDao extends BaseDao
{
    function getParcelDetails(ParcelTrackingRequest $request): ParcelTracking
    {
        try {
            throw('');
        } catch (\Exception $error) {
            throw $error;
        }
    }
}
