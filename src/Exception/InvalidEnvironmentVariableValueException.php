<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\Exception;

use Ghostwriter\LibrariesIo\Interface\ExceptionInterface;
use InvalidArgumentException;

final class InvalidEnvironmentVariableValueException extends InvalidArgumentException implements ExceptionInterface {}
