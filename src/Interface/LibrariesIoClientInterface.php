<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\Interface;

use Psr\Http\Message\ResponseInterface;

interface LibrariesIoClientInterface
{
    public function delete(string $endpoint, array $query = []): ResponseInterface;

    public function get(string $endpoint, array $query = []): ResponseInterface;

    public function post(string $endpoint, array $query = []): ResponseInterface;

    public function put(string $endpoint, array $query = []): ResponseInterface;
}
