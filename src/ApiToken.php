<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo;

use Ghostwriter\LibrariesIo\Exception\InvalidAPIKeyException;
use Ghostwriter\LibrariesIo\Interface\ApiTokenInterface;
use SensitiveParameter;

use function preg_match;
use function sprintf;

final readonly class ApiToken implements ApiTokenInterface
{
    public function __construct(
        #[SensitiveParameter]
        private string $token,
    ) {
        if (1 !== preg_match('#^[a-z0-9]+$#iu', $token)) {
            throw new InvalidAPIKeyException(sprintf(
                'The API key "%s" is invalid. %s',
                $token,
                'It must be a 40-character string consisting of letters and numbers.',
            ));
        }
    }

    public static function new(string $token): self
    {
        return new self($token);
    }

    public function toString(): string
    {
        return $this->token;
    }
}
