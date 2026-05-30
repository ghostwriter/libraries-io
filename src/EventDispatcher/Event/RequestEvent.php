<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\EventDispatcher\Event;

use Ghostwriter\Uuid\Interface\UuidInterface;
use Ghostwriter\Uuid\Uuid;
use Psr\Http\Message\RequestInterface;

final readonly class RequestEvent
{
    public function __construct(
        public RequestInterface $request,
        public UuidInterface $uuid
    ) {}

    public static function new(RequestInterface $request, string $uuid): self
    {
        return new self(request: $request, uuid: Uuid::fromString($uuid));
    }
}
