<?php

declare(strict_types=1);

namespace Fastway\Core\Api;

class BaseClient
{

    public function __construct(public \GuzzleHttp\Client $client) {}

    public function httpGet() {}

    public function httpPost() {}
}
