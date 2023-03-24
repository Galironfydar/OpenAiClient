<?php

namespace Galironfydar\Tests;

use Galironfydar\Api\ChatApi;
use Galironfydar\Messages\SystemMessage;
use Galironfydar\Messages\UserMessage;
use Galironfydar\Models\ChatModel;
use PHPUnit\Framework\TestCase;

class ChatApiTest extends TestCase
{

    use LoadsYamlConfiguration;
    private $apiKey = 'your_api_key';
    private $chatApi;

    protected function setUp(): void
    {
        //
    }

    public function testCreateChatCompletion(): void
    {
        $model = 'gpt-3.5-turbo';

        $model = new ChatModel('Conversation-1');
        $this->chatApi = new ChatApi($this->apiKey);


        $model->addMessage(new SystemMessage('You are a helpful assistant.'));
        $model->addMessage(new UserMessage('Who won the world series in 2020?'));

        $this->chatApi->send($model);

        $model->addMessage(new UserMessage('Any more information about that?'));

        $model = $this->chatApi->send($model);


        $this->assertInstanceOf(ChatModel::class, $model);
        $this->assertNotEmpty($model->getMessages());
    }
}

