<?php

declare(strict_types=1);

namespace Fastway\ParcelQuote\Repo;

use Fastway\ParcelQuote\Api\ParcelQuoteApi;
use Fastway\ParcelQuote\Dao\ParcelQuoteDao;
use Fastway\ParcelQuote\Model\ParcelQuote;
use Fastway\ParcelQuote\Model\ParcelQuoteRequest;

final class ParcelQuoteRepo
{
    public function __construct(private ParcelQuoteApi $api, private ParcelQuoteDao $dao) {}

    function getParcelQuote(ParcelQuoteRequest $request): ParcelQuote
    {
        try {
            return $this->dao->getParcelQuote($request);
        } catch (\Throwable $error) {
            try {
                $results = $this->api->getParcelQuote($request);
                $this->dao->saveParcelQuote(
                    $request,
                    $results->toJson()
                );
                return $results;
            } catch (\Throwable $error) {
                throw $error;
            }
        }
    }
}
