# Libraries Io

[![GitHub Sponsors](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/libraries-io&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)
[![Automation](https://github.com/ghostwriter/libraries-io/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/libraries-io/actions/workflows/automation.yml)
[![Supported PHP Version](https://badgen.net/packagist/php/ghostwriter/libraries-io?color=8892bf)](https://www.php.net/supported-versions)
[![Downloads](https://badgen.net/packagist/dt/ghostwriter/libraries-io?color=blue)](https://packagist.org/packages/ghostwriter/libraries-io)

A libraries.io API Client for PHP.

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

// or manually provide the API token from https://libraries.io/account
$client = LibrariesIoClient::new('Valid40CharactersLongNonEmptyTokenString');

$response = $client->get('/search', [
 'platforms' => 'Packagist',
 'q' => 'ghostwriter/container',
 'per_page' => 30, // default is 30, max is 100
 'page' => 1, // default is 1
]);

$payload = $response->getBody()->getContents();

echo $payload;
```

### API Methods

The client supports these [API methods](https://libraries.io/api):

```php
// Platforms: Get a list of supported package managers.
$client->get('/platforms');
// Project: Get information about a package and its versions.
$client->get('/Packagist/ghostwriter/container');
// Project Dependencies: Get a list of dependencies for a version of a project, pass latest to get dependency info for the latest available version
$client->get('/Packagist/ghostwriter/container/dependencies');
// Project Dependents: Get packages that have at least one version that depends on a given project.
$client->get('/Packagist/ghostwriter/container/dependents');
// Project Dependent Repositories: Get repositories that depend on a given project.
$client->get('/Packagist/ghostwriter/container/dependent_repositories');
// Project Contributors: Get users that have contributed to a given project.
$client->get('/Packagist/ghostwriter/container/contributors');
// Project SourceRank: Get breakdown of SourceRank score for a given project.
$client->get('/Packagist/ghostwriter/container/sourcerank');
// Project Search: Search for projects by name
$client->get('/search', [
    'q' => 'ghostwriter/container',
    'keywords' => 'container',
    'platforms' => 'Packagist',
    'languages' => 'PHP',
    'licenses' => 'BSD-3-Clause',
]);
// Repository: Get info for a repository. (only works for open source repositories)
$client->get('/github/ghostwriter/container');
// Repository Dependencies: Get a list of dependencies for all of a repository's projects. (only works for open source repositories)
$client->get('/github/ghostwriter/container/dependencies');
// Repository Projects: Get a list of packages referencing the given repository.
$client->get('/github/ghostwriter/container/projects');
// User: Get information for a given user or organization.
$client->get('/github/ghostwriter');
// User Repositories: Get repositories owned by a user.
$client->get('/github/ghostwriter/repositories');
// User Packages: Get a list of packages referencing the given user's repositories.
$client->get('/github/ghostwriter/projects');
// User Packages Contributions: Get a list of packages that the given user has contributed to.
$client->get('/github/ghostwriter/project-contributions');
// User Repository Contributions: Get a list of repositories that the given user has contributed to.
$client->get('/repositories/github/ghostwriter/repository-contributions');
// User Dependencies: Get a list of unique packages that the given user's repositories list as a dependency. Ordered by frequency of use in those repositories.
$client->get('/dependencies/github/ghostwriter/dependencies');
// User Subscriptions: List packages that a user is subscribed to receive notifications about new releases.
$client->get('/subscriptions/Packagist/ghostwriter/container');
// Subscribe to a project: Subscribe to receive notifications about new releases of a project.
$client->post('/subscriptions/Packagist/ghostwriter/container');
// Check if subscribed to a project: Check if a users is subscribed to receive notifications about new releases of a project.
$client->get('/subscriptions/Packagist/ghostwriter/container');
// Update a subscription: Update the options for a subscription.
$client->put('/subscriptions/Packagist/ghostwriter/container');
// Unsubscribe from a project: Stop receiving release notifications from a project.
$client->delete('/subscriptions/Packagist/ghostwriter/container');
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
