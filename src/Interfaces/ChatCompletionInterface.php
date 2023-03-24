<?php

namespace Galironfydar\Interfaces;

use Galironfydar\Models\ChatModel;

interface ChatCompletionInterface
{
    public function send(ChatModel $model, array $parameters = []): ChatModel;
}
