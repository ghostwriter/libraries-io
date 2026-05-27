<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Container\Interface\BuilderInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ProviderInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\LibrariesIo\Container\LibrariesIoProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use ReflectionClass;

use Tests\Unit\AbstractTestCase;
use Throwable;

use function count;
use function in_array;
use function is_a;

#[CoversClass(LibrariesIoProvider::class)]
final class LibrariesIoProviderTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExtendsAbstractProvider(): void
    {
        self::assertTrue(is_a(LibrariesIoProvider::class, AbstractProvider::class, true));
    }

    /** @throws Throwable */
    public function testImplementsProviderInterface(): void
    {
        self::assertTrue(is_a(LibrariesIoProvider::class, ProviderInterface::class, true));
    }

    /** @throws Throwable */
    public function testLibrariesIoProviderBoot(): void
    {
        $container = $this->createMock(ContainerInterface::class);

        foreach ($this->getMethods(ContainerInterface::class) as $method) {
            $last = $container->expects(self::never())->method($method)->withAnyParameters();
        }

        $last->seal();

        $provider = new LibrariesIoProvider();
        $provider->boot($container);
    }

    /** @throws Throwable */
    public function testLibrariesIoProviderRegister(): void
    {
        $builder = $this->createMock(BuilderInterface::class);

        $arguments = [];

        foreach (LibrariesIoProvider::ALIAS as $alias => $service) {
            $arguments[] = [$alias, $service];
        }

        $builder->expects(self::exactly(count($arguments)))
            ->method('alias')
            ->withParameterSetsInOrder(...$arguments);

        $arguments = [];
        foreach (LibrariesIoProvider::FACTORY as $service => $factory) {
            $arguments[] = [$service, $factory];
        }

        $builder->expects(self::exactly(count($arguments)))
            ->method('factory')
            ->withParameterSetsInOrder(...$arguments);

        foreach ($this->getMethods(BuilderInterface::class, ['alias', 'factory']) as $method) {
            $last = $builder->expects(self::never())->method($method)->withAnyParameters();
        }

        $last->seal();

        $provider = new LibrariesIoProvider();
        $provider->register($builder);
    }

    private function getMethods(string $class, array $except = []): array
    {
        $reflectionClass = new ReflectionClass($class);

        $methods = [];
        foreach ($reflectionClass->getMethods() as $method) {
            $name = $method->getName();

            if (in_array($name, $except, true)) {
                continue;
            }

            $methods[] = $name;
        }

        return $methods;
    }
}
