<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\LibrariesIo\Exception\LibrariesIoClientException;
use Ghostwriter\LibrariesIo\Interface\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use RuntimeException;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(LibrariesIoClientException::class)]
final class LibrariesIoClientExceptionTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExtendsRuntimeException(): void
    {
        self::assertTrue(is_a(LibrariesIoClientException::class, RuntimeException::class, true));
        self::assertTrue(is_a(LibrariesIoClientException::class, Throwable::class, true));
    }

    /** @throws Throwable */
    public function testImplementsExceptionInterface(): void
    {
        self::assertTrue(is_a(LibrariesIoClientException::class, ExceptionInterface::class, true));
    }
}
