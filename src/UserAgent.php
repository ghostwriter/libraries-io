<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo;

use Ghostwriter\LibrariesIo\Interface\UserAgentInterface;

final readonly class UserAgent implements UserAgentInterface
{
    public function __construct(
        private string $name
    ) {}

    public static function new(string $name): self
    {
        return new self($name);
    }

    public function toString(): string
    {
        return $this->name;
    }
}
