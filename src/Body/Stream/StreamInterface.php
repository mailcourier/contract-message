<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Body\Stream;

interface StreamInterface
{
    public function eof(): bool;

    public function read(int $length): string;

    public function write(string $data): void;

    public function rewind(): void;
}
