<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Dao;

use Fastway\Core\Dao\BaseDao;
use Fastway\ParcelTracking\Model\Parcel;

class ParcelTrackingDao extends BaseDao
{
    private $key = 'ParcelTrackingDao.getParcelDetails';

    function getParcelDetails(): array
    {
        try {
            $results = $this->getData($this->key);
            return
                array_map(
                    fn($item) => Parcel::fromJson((array)$item),
                    [$results]
                );
        } catch (\Throwable $error) {
            throw $error;
        }
    }

    function saveParcelDetails(array $value): void
    {
        try {
            $this->saveData($this->key, $value);
        } catch (\Throwable $error) {
            throw $error;
        }
    }
}
