<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Body\Collection;

use Countable;
use Iterator;
use Postboy\Contract\Message\Body\BodyInterface;
use Postboy\Contract\Message\Exception\CanNotRemoveLastElement;

interface BodyCollectionInterface extends Iterator, Countable
{
    /**
     * @param BodyInterface $body
     * @return void
     */
    public function add(BodyInterface $body): void;

    /**
     * @param BodyInterface $body
     * @return void
     * @throws CanNotRemoveLastElement
     */
    public function remove(BodyInterface $body): void;

    /**
     * @return BodyInterface
     */
    public function current(): BodyInterface;

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
