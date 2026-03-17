<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Api;

use Exception;
use Fastway\Core\Api\BaseClient;
use Fastway\ParcelTracking\Model\Parcel;
use Fastway\ParcelTracking\Model\ParcelTrackingRequest;

class ParcelTrackingApi extends BaseClient
{
    function getParcelDetails(ParcelTrackingRequest $request): array
    {
        try {
            $results = $this->httpPost(
                $this->baseUrl . '/latest/tracktrace/massdetail/' . $request->parcelNumber
            );
            $body = (array)json_decode($results->getBody()->getContents());
            if (isset($body['result'][0]->error)) {
                throw new Exception($body['result'][0]->error);
            } else {
                return array_map(fn($item) => Parcel::fromJson((array)$item), (array)$body['result']);
            }
        } catch (\Throwable $error) {
            throw $error;
        }
    }
}
