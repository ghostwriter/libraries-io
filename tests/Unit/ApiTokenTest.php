<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\LibrariesIo\ApiToken;
use Ghostwriter\LibrariesIo\Interface\ApiTokenInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Throwable;

use function is_a;

#[CoversClass(ApiToken::class)]
final class ApiTokenTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsApiTokenInterface(): void
    {
        self::assertTrue(is_a(ApiToken::class, ApiTokenInterface::class, true));
    }
}
