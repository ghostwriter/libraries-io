<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory;

use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\LibrariesIo\Container\Factory\UserAgentFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(UserAgentFactory::class)]
final class UserAgentFactoryTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsFactoryInterface(): void
    {
        self::assertTrue(is_a(UserAgentFactory::class, FactoryInterface::class, true));
    }
}
