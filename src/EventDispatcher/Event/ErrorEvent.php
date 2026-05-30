<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\EventDispatcher\Event;

use Ghostwriter\Uuid\Interface\UuidInterface;
use Ghostwriter\Uuid\Uuid;
use Psr\Http\Message\RequestInterface;
use Throwable;

final readonly class ErrorEvent
{
    public function __construct(
        public RequestInterface $request,
        public Throwable $throwable,
        public UuidInterface $uuid,
    ) {}

    public static function new(RequestInterface $request, Throwable $throwable, string $uuid): self
    {
        return new self($request, $throwable, Uuid::fromString($uuid));
    }
}
