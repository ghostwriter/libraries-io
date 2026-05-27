<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\LibrariesIo\BaseUri;
use Ghostwriter\LibrariesIo\Exception\InvalidEnvironmentVariableValueException;
use Override;
use Throwable;

use function getenv;
use function is_string;

/**
 * @see BaseUriFactoryTest
 *
 * @implements FactoryInterface<BaseUri>
 */
final readonly class BaseUriFactory implements FactoryInterface
{
    private const string LIBRARIES_IO_BASE_URI = 'https://libraries.io/api/';

    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): BaseUri
    {
        $baseUri = getenv('LIBRARIES_IO_BASE_URI');

        if (false === $baseUri) {
            $baseUri = self::LIBRARIES_IO_BASE_URI;
        }

        if (! is_string($baseUri)) {
            throw new InvalidEnvironmentVariableValueException(
                'Environment variable LIBRARIES_IO_BASE_URI must be a string.'
            );
        }

        return BaseUri::new($baseUri);
    }
}
