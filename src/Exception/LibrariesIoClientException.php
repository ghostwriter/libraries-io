<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo\Exception;

use Ghostwriter\LibrariesIo\Interface\ExceptionInterface;
use RuntimeException;

final class LibrariesIoClientException extends RuntimeException implements ExceptionInterface {}
