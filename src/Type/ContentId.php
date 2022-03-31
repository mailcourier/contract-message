<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Type;

use InvalidArgumentException;

class ContentId
{
    private string $name;

    final public function __construct(string $name)
    {
        $name = trim($name);
        if ($name === '') {
            throw new InvalidArgumentException('contentID contains bad characters');
        }
        $this->name = urlencode($name);
    }

    final public function __toString(): string
    {
        return $this->name;
    }
}
