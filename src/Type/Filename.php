<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Type;

use InvalidArgumentException;

class Filename
{
    private string $name;

    final public function __construct(string $name)
    {
        $name = trim($name);
        if ($name === '' || preg_match('/[\\/*?"<>\\\\]/ui', $name)) {
            throw new InvalidArgumentException('filename contains bad characters');
        }
        $this->name = $name;
    }

    final public function __toString(): string
    {
        return $this->name;
    }
}
