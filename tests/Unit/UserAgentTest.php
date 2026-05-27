<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\LibrariesIo\Interface\UserAgentInterface;
use Ghostwriter\LibrariesIo\UserAgent;
use PHPUnit\Framework\Attributes\CoversClass;
use Throwable;

use function is_a;

#[CoversClass(UserAgent::class)]
final class UserAgentTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsUserAgentInterface(): void
    {
        self::assertTrue(is_a(UserAgent::class, UserAgentInterface::class, true));
    }
}
