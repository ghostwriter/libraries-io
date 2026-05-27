<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\Container\Factory;

use Composer\InstalledVersions;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\LibrariesIo\UserAgent;
use Override;
use Throwable;

use function sprintf;

/**
 * @see UserAgentFactoryTest
 *
 * @implements FactoryInterface<UserAgent>
 */
final readonly class UserAgentFactory implements FactoryInterface
{
    private const string CONTACT = 'nathanael.esayeas@protonmail.com';

    private const string PACKAGE = 'ghostwriter/libraries-io';

    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): UserAgent
    {
        return UserAgent::new(sprintf(
            '%s/%s (%s; +mailto:%s)',
            self::PACKAGE,
            InstalledVersions::getPrettyVersion(self::PACKAGE) ?? 'unknown-version',
            sprintf('https://github.com/%s', self::PACKAGE),
            self::CONTACT
        ));
    }
}
