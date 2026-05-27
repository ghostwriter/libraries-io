<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory;

use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\LibrariesIo\Container\Factory\BaseUriFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(BaseUriFactory::class)]
final class BaseUriFactoryTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsFactoryInterface(): void
    {
        self::assertTrue(is_a(BaseUriFactory::class, FactoryInterface::class, true));
    }
}
