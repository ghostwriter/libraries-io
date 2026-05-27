# Libraries Io

[![GitHub Sponsors](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/libraries-io&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)
[![Automation](https://github.com/ghostwriter/libraries-io/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/libraries-io/actions/workflows/automation.yml)
[![Supported PHP Version](https://badgen.net/packagist/php/ghostwriter/libraries-io?color=8892bf)](https://www.php.net/supported-versions)
[![Downloads](https://badgen.net/packagist/dt/ghostwriter/libraries-io?color=blue)](https://packagist.org/packages/ghostwriter/libraries-io)

A libraries.io API Client for PHP

> [!WARNING]
>
> This project is not finished yet, work in progress.

## Installation

You can install the package via composer:

``` bash
composer require ghostwriter/libraries-io
```

### Star ⭐️ this repo if you find it useful

You can also star (🌟) this repo to find it easier later.

## Usage

```php
<?php

declare(strict_types=1);

use Ghostwriter\LibrariesIo\LibrariesIoClient;

// This will attempt to resolve the API token from the `LIBRARIES_IO_TOKEN` environment variable
$client = LibrariesIoClient::new(); 

// or manually provide the API token
$client = LibrariesIoClient::new('0123456789abcdef0123456789abcdef01234567');

$response = $client->get('/search', [
	'platform' => 'packagist',
	'q' => 'ghostwriter/libraries-io',
]);

$payload = $response->getBody()->getContents();

echo $payload;
```

### Request methods

The client supports these methods:

```php
$client->get('/search', ['platform' => 'packagist', 'q' => 'ghostwriter/libraries-io']);
$client->post('/subscriptions', ['platform' => 'packagist', 'name' => 'ghostwriter/libraries-io']);
$client->put('/subscriptions', ['platform' => 'packagist', 'name' => 'ghostwriter/libraries-io']);
$client->delete('/subscriptions', ['platform' => 'packagist', 'name' => 'ghostwriter/libraries-io']);
```

### Notes

- `api_key` is added to every request automatically.
- `User-Agent` and `X-Request-Id` headers are added to every request automatically.

### Environment variables

If you resolve the client through the container provider/factories, these variables are used:

- `LIBRARIES_IO_TOKEN` (required)
- `LIBRARIES_IO_BASE_URI` (optional, defaults to `https://libraries.io/api/`)

### Credits

- [Nathanael Esayeas](https://github.com/ghostwriter)
- [All Contributors](https://github.com/ghostwriter/libraries-io/contributors)

### Changelog

Please see [CHANGELOG.md](./CHANGELOG.md) for more information on what has changed recently.

### License

Please see [LICENSE](./LICENSE) for more information on the license that applies to this project.

### Security

Please see [SECURITY.md](./SECURITY.md) for more information on security disclosure process.
