# Laravel AI SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/builtbyberry/laravel-ai-sdk.svg?style=flat-square)](https://packagist.org/packages/builtbyberry/laravel-ai-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/builtbyberry/laravel-ai-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/builtbyberry/laravel-ai-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/builtbyberry/laravel-ai-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/builtbyberry/laravel-ai-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/builtbyberry/laravel-ai-sdk.svg?style=flat-square)](https://packagist.org/packages/builtbyberry/laravel-ai-sdk)

Laravel AI SDK is a driver-based package that simplifies the integration of various AI services into your Laravel application. Easily switch between AI providers, send requests, and handle responses in a unified manner.

## Features

- **Driver-Based Architecture:** Plug and play with different AI providers. 
- **Unified API:** Consistent method names and response formats across all AI services. 
- **Customizable:** Extend the package with your own drivers or modify existing ones. 
- **Background Processing:** Queue support for handling long-running AI tasks.

## Installation

You can install the package via composer:

```bash
composer require builtbyberry/laravel-ai-sdk
```

### Configuration

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-ai-sdk-config"
```

These are the contents of the published config file:

```php
return [
    'driver' => \YourNamespace\LaravelAiSdk\Drivers\SampleDriver::class,

    'drivers' => [
        'sample' => [
            'api_key' => env('SAMPLE_API_KEY'),
            // Other configuration options for your sample driver
        ],

        // Add other drivers here
    ],
];
```

#### Environment Variables

Don't forget to include any environment variables needed for deployment based on the driver you've selected.

```bash
SAMPLE_API_KEY=your-sample-api-key
```

## Usage

### Basic Usage

First, inject the AI class into your service or controller:

```php
use BuiltByBerry\LaravelAiSdk\AI;

class ExampleController extends Controller
{
    protected $ai;

    public function __construct(AI $ai)
    {
        $this->ai = $ai;
    }

    public function generateResponse(Request $request)
    {
        $result = $this->ai->execute($request->input('prompt'));

        return response()->json($result);
    }
}
```

### Switching Drivers

To switch between different AI drivers, simply update your config/ai.php configuration file:

```php
return [
    'driver' => \YourNamespace\LaravelAiSdk\Drivers\AnotherDriver::class,
    // Other configuration options
];
```

You can also switch drivers dynamically:

```php
$ai = new AI(new \YourNamespace\LaravelAiSdk\Drivers\AnotherDriver());
$result = $ai->execute('Your prompt here');
``` 

### Advance Features

#### Queueing AI Request

Leverage Laravel’s queue system to process AI requests in the background:

```php
dispatch(function () use ($ai) {
    $result = $ai->execute('Your long-running prompt');
    // Handle the result
});
```

#### Customizing Responses

You can create custom response parsers by extending the base AI class or by modifying the driver’s parseResponse method:

```php
class CustomDriver extends SampleDriver
{
    public function parseResponse($response): array
    {
        // Custom parsing logic
        return parent::parseResponse($response);
    }
}
```

## Testing

The package comes with a suite of unit tests. To run them, execute:

```bash
composer test
```

Make sure to write additional tests as you extend the package.

## Changelog

See [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

See [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Daniel Berry](https://github.com/builtbyberry)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). See [License File](LICENSE.md) for more information.
