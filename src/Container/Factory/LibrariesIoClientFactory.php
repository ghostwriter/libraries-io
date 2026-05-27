<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\Container\Factory;

use Ghostwriter\Clock\Interface\ClockInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\EventDispatcher\Interface\EventDispatcherInterface;
use Ghostwriter\LibrariesIo\Interface\ApiTokenInterface;
use Ghostwriter\LibrariesIo\Interface\BaseUriInterface;
use Ghostwriter\LibrariesIo\Interface\UserAgentInterface;
use Ghostwriter\LibrariesIo\LibrariesIoClient;
use Override;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Throwable;

/**
 * @see LibrariesIoClientFactoryTest
 *
 * @implements FactoryInterface<LibrariesIoClient>
 */
final readonly class LibrariesIoClientFactory implements FactoryInterface
{
    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): LibrariesIoClient
    {
        return new LibrariesIoClient(
            $container->get(ApiTokenInterface::class),
            $container->get(BaseUriInterface::class),
            $container->get(ClientInterface::class),
            $container->get(ClockInterface::class),
            $container->get(EventDispatcherInterface::class),
            $container->get(RequestFactoryInterface::class),
            $container->get(UriFactoryInterface::class),
            $container->get(UserAgentInterface::class)
        );
    }
}
