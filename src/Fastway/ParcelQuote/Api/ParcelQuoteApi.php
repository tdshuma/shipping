<?php

declare(strict_types=1);

namespace Fastway\ParcelQuote\Api;

use Fastway\Core\Api\BaseClient;
use Fastway\ParcelQuote\Model\ParcelQuote;
use Fastway\ParcelQuote\Model\ParcelQuoteRequest;

class ParcelQuoteApi extends BaseClient
{
    function getParcelQuote(ParcelQuoteRequest $request): ParcelQuote
    {
        try {
            $results = $this->httpPost(
                $this->baseUrl . '/psc/lookup/' . $request->pick_up . '/' . $request->drop_off
                    . '/4110/5'
            );
            $body = (array)json_decode($results->getBody()->getContents());
            return ParcelQuote::fromJson((array)$body['result']);
        } catch (\Throwable $error) {
            throw $error;
        }
    }
}
