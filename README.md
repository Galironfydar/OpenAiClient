# Galironfydar/OpenAI-API-Client

A PHP client library for the OpenAI API, designed to make it easier for PHP developers to use the OpenAI API in their projects.

### Installation
To use this package, you first need to install it via Composer. You can do this by running the following command:

```
composer require galironfydar/openai-api-client
```

### Usage

To get started with the OpenAI API, you will first need to obtain an API key from the OpenAI website. Once you have your API key, you can use it to create a new instance of the ChatApi class:

```php
use Galironfydar\Api\ChatApi;
use Galironfydar\Models\ChatModel;

$openai = new ChatApi('YOUR_API_KEY');
```

After that, you can create a new ChatModel object, set the user message, and send it to the OpenAI API:

```php
$model = new ChatModel('ChatTitle');
$model->setMessage(new SystemMessage('You are an AI assistant. You will help the user any way you can'));
$model->setMessage(new UserMessage('I don\'t know what to have for dinner, can you come up with recipe ideas that use sweet potatoes?'));

$response = $openai->send($model);

echo $response->getMessages()[0]->getContent(); // Outputs the AI's response
```

### License

This package is released under the MIT license.