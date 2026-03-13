<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Api;

use Fastway\Core\Api\BaseClient;
use Fastway\ParcelTracking\Model\ParcelTracking;
use Fastway\ParcelTracking\Model\ParcelTrackingRequest;

final class ParcelTrackingApi extends BaseClient
{
    function getParcelDetails(ParcelTrackingRequest $request): ParcelTracking
    {
        try {
            $results = $this->httpGet(
                $this->baseUrl . '/latest/tracktrace/massdetail/' . $request->parcelNumber
            );
            $body = $results->getBody()->getContents();
            return new ParcelTracking('good');
        } catch (\Exception $error) {
            throw $error;
        }
    }
}
