<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory;

use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\LibrariesIo\Container\Factory\ApiTokenFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(ApiTokenFactory::class)]
final class ApiTokenFactoryTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsFactoryInterface(): void
    {
        self::assertTrue(is_a(ApiTokenFactory::class, FactoryInterface::class, true));
    }
}
