## galironfydar/openai-api-client

A client library for the OpenAI API, written in PHP.

### Installation
To install this package, you can use Composer:

```
composer require galironfydar/openai-api-client
```

### Usage

Here's an example of how to use the Chat API:

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Galironfydar\Api\ChatApi;
use Galironfydar\Models\ChatModel;

class MyClass
{
    public function __construct(
        protected ChatApi $chatApi
    )
    {
    }

    public function __invoke()
    {
        $model = new ChatModel('ChatTitle');
        $model->setMessage(new SystemMessage('You are an AI assistant. You will help the user any way you can'));
        $model->setMessage(new UserMessage('I don\'t know what to have for dinner, can you come up with recipe ideas that use sweet potatoes?');
        
        // Returns the ChatModel::class with an AI Message appended
        $this->chatApi->send($model);
    }
}
```

License
This package is released under the MIT license.