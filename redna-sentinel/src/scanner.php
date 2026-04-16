<?php

declare(strict_types=1);

namespace Redna\Sentinel;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Scanner
{
    private Client $client;

    public function __construct(string $baseUrl)
    {
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'timeout'  => 10.0,
            'headers'  => [
                'User-Agent' => 'RednaSentinel/1.0 (+https://redna.com.tr)',
            ],
            'http_errors' => false,
        ]);
    }

    public function request(string $method, string $path): mixed
    {
        try {
            return $this->client->request($method, $path);
        } catch (GuzzleException $e) {
            return null;
        }
    }
}