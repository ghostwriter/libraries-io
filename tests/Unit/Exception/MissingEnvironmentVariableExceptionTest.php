<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\LibrariesIo\Exception\MissingEnvironmentVariableException;
use Ghostwriter\LibrariesIo\Interface\ExceptionInterface;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(MissingEnvironmentVariableException::class)]
final class MissingEnvironmentVariableExceptionTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExtendsInvalidArgumentException(): void
    {
        self::assertTrue(is_a(MissingEnvironmentVariableException::class, InvalidArgumentException::class, true));
        self::assertTrue(is_a(MissingEnvironmentVariableException::class, Throwable::class, true));
    }

    /** @throws Throwable */
    public function testImplementsExceptionInterface(): void
    {
        self::assertTrue(is_a(MissingEnvironmentVariableException::class, ExceptionInterface::class, true));
    }
}
