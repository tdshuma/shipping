<?php

declare(strict_types=1);

namespace Fastway\ParcelQuote\Dao;

use Fastway\Core\Dao\BaseDao;
use Fastway\ParcelQuote\Model\ParcelQuote;
use Fastway\ParcelQuote\Model\ParcelQuoteRequest;

class ParcelQuoteDao extends BaseDao
{
    private $key = 'ParcelQuoteDao.getParcelQuote';

    function getParcelQuote(ParcelQuoteRequest $request): ParcelQuote
    {
        try {
            $results = $this->getData($this->key . '_' . md5($request->drop_off) . '_' . md5($request->postal_code) . '_' . md5($request->parcel_weight));
            return ParcelQuote::fromJson((array)$results);
        } catch (\Throwable $error) {
            throw $error;
        }
    }

    function saveParcelQuote(ParcelQuoteRequest $request, array $value): void
    {
        try {
            $this->saveData($this->key . '_' . md5($request->drop_off) . '_' . md5($request->postal_code) . '_' . md5($request->parcel_weight), $value);
        } catch (\Throwable $error) {
            throw $error;
        }
    }
}
