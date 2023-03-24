<?php

namespace Galironfydar\Messages;

abstract class ChatMessage
{
    protected string $role;
    public function __construct(
        protected string $content,
    )
    {
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}