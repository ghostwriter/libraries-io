<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\LibrariesIo\Exception\InvalidAPIKeyException;
use Ghostwriter\LibrariesIo\Interface\ExceptionInterface;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;

use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(InvalidAPIKeyException::class)]
final class InvalidAPIKeyExceptionTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExtendsInvalidArgumentException(): void
    {
        self::assertTrue(is_a(InvalidAPIKeyException::class, InvalidArgumentException::class, true));
        self::assertTrue(is_a(InvalidAPIKeyException::class, Throwable::class, true));
    }

    /** @throws Throwable */
    public function testImplementsExceptionInterface(): void
    {
        self::assertTrue(is_a(InvalidAPIKeyException::class, ExceptionInterface::class, true));
    }
}
