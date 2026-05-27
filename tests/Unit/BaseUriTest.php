<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\LibrariesIo\BaseUri;
use Ghostwriter\LibrariesIo\Interface\BaseUriInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Throwable;

use function is_a;

#[CoversClass(BaseUri::class)]
final class BaseUriTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsBaseUriInterface(): void
    {
        self::assertTrue(is_a(BaseUri::class, BaseUriInterface::class, true));
    }
}
