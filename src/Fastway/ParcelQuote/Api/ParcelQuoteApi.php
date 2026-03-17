<?php

declare(strict_types=1);

namespace Fastway\ParcelQuote\Api;

use Exception;
use Fastway\Core\Api\BaseClient;
use Fastway\ParcelQuote\Model\ParcelQuote;
use Fastway\ParcelQuote\Model\ParcelQuoteRequest;

class ParcelQuoteApi extends BaseClient
{
    function getParcelQuote(ParcelQuoteRequest $request): ParcelQuote
    {
        try {
            $results = $this->httpPost(
                $this->baseUrl . '/latest/psc/lookup/' . $request->pick_up . '/' . $request->drop_off
                    . '/' . $request->postal_code . '/' . $request->parcel_weight
            );
            $body = (array)json_decode($results->getBody()->getContents());
            if(isset($body['error'])) {
                throw new Exception($body['error']);
            }
            return ParcelQuote::fromJson((array)$body['result']);
        } catch (\Throwable $error) {
            throw $error;
        }
    }
}
