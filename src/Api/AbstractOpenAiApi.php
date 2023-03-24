<?php

namespace Galironfydar\Api;

use GuzzleHttp\Client;

abstract class AbstractOpenAiApi
{
    protected string $apiKey;
    protected Client $client;
    protected string $baseUrl = 'https://api.openai.com/v1/';

    protected string $model = 'gpt-3.5-turbo';

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => "Bearer $apiKey",
                'Content-Type' => 'application/json',
            ],
        ]);
    }
}
