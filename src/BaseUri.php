<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo;

use Ghostwriter\LibrariesIo\Interface\BaseUriInterface;

final readonly class BaseUri implements BaseUriInterface
{
    public function __construct(
        private string $uri
    ) {}

    public static function new(string $uri): self
    {
        return new self($uri);
    }

    public function toString(): string
    {
        return $this->uri;
    }
}
