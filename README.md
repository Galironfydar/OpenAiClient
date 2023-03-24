## galironfydar/openai-api-client

A client library for the OpenAI API, with Symfony integration.

### Installation
To install this package, you can use Composer:

```
composer require galironfydar/openai-api-client
```

### Usage

To use the OpenAI API client in your Symfony project, you can create a new instance of the Galironfydar\OpenAIApi\OpenAiApi class and pass it as a dependency to your service.

Here's an example of how to use the OpenAI API client in a Symfony service:

```php
<?php

namespace App\Service;

use Galironfydar\OpenAIApi\OpenAiApi;

class MyService
{
    private $openAiApi;

    public function __construct(OpenAiApi $openAiApi)
    {
        $this->openAiApi = $openAiApi;
    }

    public function generateText(string $model, string $prompt, int $length): string
    {
        return $this->openAiApi->generateText($model, $prompt, $length);
    }
}
```

In this example, we're defining a MyService class that has a dependency on the OpenAiApi class. We're using constructor injection to pass the OpenAiApi instance to the MyService instance.

To configure the OpenAiApi instance, you can add the following configuration to your Symfony application's services.yaml file:

```yaml
services:
    Galironfydar\OpenAIApi\OpenAiApi:
        arguments:
            $apiKey: '%env(OPENAI_API_KEY)%'
```

In this example, we're defining a service for the OpenAiApi class and passing the OPENAI_API_KEY environment variable as an argument to the OpenAiApi constructor.

Make sure to set the OPENAI_API_KEY environment variable in your Symfony application's .env or .env.local file.

After configuring the OpenAiApi instance, you can use it in your Symfony application code like this:


```
<?php

namespace App\Controller;

use App\Service\MyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function index(MyService $myService): Response
    {
        $generatedText = $myService->generateText('davinci', 'Hello, World!', 50);

        return $this->render('home/index.html.twig', [
            'generated_text' => $generatedText,
        ]);
    }
}
```

In this example, we're using the MyService class to generate some text using the OpenAI API, and passing the generated text to a Twig template for display.

License
This package is released under the MIT license.