<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\LibrariesIo\Interface\LibrariesIoClientInterface;
use Ghostwriter\LibrariesIo\LibrariesIoClient;
use PHPUnit\Framework\Attributes\CoversClass;
use Throwable;

use function is_a;

#[CoversClass(LibrariesIoClient::class)]
final class LibrariesIoClientTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsLibrariesIoInterface(): void
    {
        self::assertTrue(is_a(LibrariesIoClient::class, LibrariesIoClientInterface::class, true));
    }
}
