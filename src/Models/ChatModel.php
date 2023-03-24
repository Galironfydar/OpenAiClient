<?php

namespace Galironfydar\Models;

use Galironfydar\Messages\ChatMessage;

class ChatModel
{
    private string $id;
    private array $messages = [];

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function addMessage(ChatMessage $message): self
    {
        $this->messages[] = $message;
        return $this;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }
}