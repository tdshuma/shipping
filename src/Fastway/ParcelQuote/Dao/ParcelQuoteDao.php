<?php

declare(strict_types=1);

namespace Fastway\ParcelQuote\Dao;

use Fastway\Core\Dao\BaseDao;
use Fastway\ParcelQuote\Model\ParcelQuote;

class ParcelQuoteDao extends BaseDao
{
    private $key = 'ParcelQuoteDao.getParcelQuote';

    function getParcelQuote(): ParcelQuote
    {
        try {
            $results = $this->getData($this->key);
            return ParcelQuote::fromJson((array)$results);
        } catch (\Throwable $error) {
            throw $error;
        }
    }

    function saveParcelQuote(array $value): void
    {
        try {
            $this->saveData($this->key, $value);
        } catch (\Throwable $error) {
            throw $error;
        }
    }
}
