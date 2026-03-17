<?php

declare(strict_types=1);

namespace Fastway\Core\Api;

use \GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class BaseClient
{
    public string $baseUrl;
    public string $apiKey;
    public Client $client;

    public function __construct(?Client $client)
    {
        $this->baseUrl = 'https://sa.api.fastway.org/';
        $this->apiKey = getenv('API_SECRET_KEY');
        $this->client = $client ?: new Client();
    }

    public function httpGet(string $url): ResponseInterface
    {
        return $this->client->get($url, [
            'query' => [
                'api_key' => $this->apiKey
            ]
        ]);
    }

    public function httpPost(string $url, ?array $body = []): ResponseInterface
    {
        return $this->client->post($url, [
            'query' => [
                'api_key' => $this->apiKey
            ],
            'json' => $body
        ]);
    }
}
