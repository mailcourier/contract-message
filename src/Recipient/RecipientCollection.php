<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Recipient;

use Countable;
use Iterator;

interface RecipientCollection extends Iterator, Countable
{
    /**
     * @return Recipient
     */
    public function current(): Recipient;

    /**
     * @return void
     */
    public function next(): void;

    /**
     * @return int
     */
    public function key(): int;

    /**
     * @return bool
     */
    public function valid(): bool;

    /**
     * @return void
     */
    public function rewind(): void;

    /**
     * @return int
     */
    public function count(): int;
}
