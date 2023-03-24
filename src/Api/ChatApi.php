<?php

namespace Galironfydar\Api;

use Galironfydar\Messages\AIMessage;
use Galironfydar\Messages\ChatMessage;
use Galironfydar\Models\ChatModel;
use GuzzleHttp\Exception\GuzzleException;
use Galironfydar\Interfaces\ChatCompletionInterface;

class ChatApi extends AbstractOpenAiApi implements ChatCompletionInterface
{
    public function send(ChatModel $model, array $parameters = []): ChatModel
    {
        $payload = array_merge([
            'model' => $this->model,
            'messages' => array_map(fn($message) => [
                'role' => $message->getRole(),
                'content' => $message->getContent(),
            ],
            $model->getMessages()
        )], $parameters);

        try {
            $response = $this->client->post('chat/completions', [
                'json' => $payload,
            ]);

            $responseData = json_decode($response->getBody(), true);

            $choices = $responseData['choices'] ?? [];

            if (!empty($choices[0])) {
                $model->addMessage(new AIMessage($choices[0]['message']['content']));
            }

            return $model;
        } catch (GuzzleException $e) {
            // Handle exceptions (e.g., log errors, return a default value, or rethrow the exception)
            throw $e;
        }
    }
}
