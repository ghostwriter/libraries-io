<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\LibrariesIo\ApiToken;
use Ghostwriter\LibrariesIo\Exception\InvalidEnvironmentVariableValueException;
use Ghostwriter\LibrariesIo\Exception\MissingEnvironmentVariableException;
use Override;
use Throwable;

use function getenv;
use function is_string;

/**
 * @see ApiTokenFactoryTest
 *
 * @implements FactoryInterface<ApiToken>
 */
final readonly class ApiTokenFactory implements FactoryInterface
{
    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): ApiToken
    {
        $token = getenv('LIBRARIES_IO_TOKEN');

        if (false === $token) {
            throw new MissingEnvironmentVariableException('Environment variable LIBRARIES_IO_TOKEN is not set.');
        }

        if (! is_string($token)) {
            throw new InvalidEnvironmentVariableValueException(
                'Environment variable LIBRARIES_IO_TOKEN must be a string.'
            );
        }

        return ApiToken::new($token);
    }
}
