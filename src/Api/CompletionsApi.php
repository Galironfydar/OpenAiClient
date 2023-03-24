<?php

namespace Galironfydar\Api;

use Galironfydar\Interfaces\CompletionInterface;
use GuzzleHttp\Exception\GuzzleException;

class CompletionsApi extends AbstractOpenAiApi implements CompletionInterface
{
    public function send(array $parameters): array
    {
        $payload = $parameters;

        try {
            $response = $this->client->post('completions', [
                'json' => $payload,
            ]);

            $responseData = json_decode($response->getBody(), true);

            return $responseData['choices'] ?? [];
        } catch (GuzzleException $e) {
            // Handle exceptions (e.g., log errors, return a default value, or rethrow the exception)
            throw $e;
        }
    }
}
