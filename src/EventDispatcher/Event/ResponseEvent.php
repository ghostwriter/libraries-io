<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\EventDispatcher\Event;

use Ghostwriter\Uuid\Interface\UuidInterface;
use Ghostwriter\Uuid\Uuid;
use Psr\Http\Message\ResponseInterface;

final readonly class ResponseEvent
{
    public function __construct(
        public ResponseInterface $response,
        public UuidInterface $uuid,
    ) {}

    public static function new(ResponseInterface $response, string $uuid): self
    {
        return new self(response: $response, uuid: Uuid::fromString($uuid));
    }
}
