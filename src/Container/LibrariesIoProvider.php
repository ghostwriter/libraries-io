<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\Container;

use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\LibrariesIo\ApiToken;
use Ghostwriter\LibrariesIo\BaseUri;
use Ghostwriter\LibrariesIo\Container\Factory\ApiTokenFactory;
use Ghostwriter\LibrariesIo\Container\Factory\BaseUriFactory;
use Ghostwriter\LibrariesIo\Container\Factory\LibrariesIoClientFactory;
use Ghostwriter\LibrariesIo\Container\Factory\UserAgentFactory;
use Ghostwriter\LibrariesIo\Interface\ApiTokenInterface;
use Ghostwriter\LibrariesIo\Interface\BaseUriInterface;
use Ghostwriter\LibrariesIo\Interface\LibrariesIoClientInterface;
use Ghostwriter\LibrariesIo\Interface\UserAgentInterface;
use Ghostwriter\LibrariesIo\LibrariesIoClient;
use Ghostwriter\LibrariesIo\UserAgent;

/**
 * @see LibrariesIoProviderTest
 */
final class LibrariesIoProvider extends AbstractProvider
{
    /**
     * alias => service.
     *
     * @var array<class-string,class-string>
     */
    public const array ALIAS = [
        ApiTokenInterface::class => ApiToken::class,
        BaseUriInterface::class => BaseUri::class,
        LibrariesIoClientInterface::class => LibrariesIoClient::class,
        UserAgentInterface::class => UserAgent::class,
    ];

    /**
     * service => factory.
     *
     * @var array<class-string,class-string<FactoryInterface>>
     */
    public const array FACTORY = [
        ApiToken::class => ApiTokenFactory::class,
        BaseUri::class => BaseUriFactory::class,
        LibrariesIoClient::class => LibrariesIoClientFactory::class,
        UserAgent::class => UserAgentFactory::class,
    ];
}
