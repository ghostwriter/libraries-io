<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\Exception;

use Ghostwriter\LibrariesIo\Interface\ExceptionInterface;
use InvalidArgumentException;

final class InvalidAPIKeyException extends InvalidArgumentException implements ExceptionInterface {}
