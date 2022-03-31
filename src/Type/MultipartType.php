<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Type;

class MultipartType
{
    private string $type;

    final public static function alternative(): self
    {
        return new self('multipart/alternative');
    }

    final public static function mixed(): self
    {
        return new self('multipart/mixed');
    }

    final public static function related(): self
    {
        return new self('multipart/related');
    }

    private function __construct(string $type)
    {
        $this->type = $type;
    }

    public function __toString(): string
    {
        return $this->type;
    }
}
