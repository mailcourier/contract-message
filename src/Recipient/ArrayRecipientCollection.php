<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Recipient;

use RuntimeException;

class ArrayRecipientCollection implements RecipientCollection
{
    /**
     * @var Recipient[]
     */
    private array $items = [];
    private int $index = 0;
    private int $cursor = 0;

    public function add(Recipient $recipient): void
    {
        foreach ($this->items as $k => $item) {
            if ($this->getUniqueKey($item) === $this->getUniqueKey($recipient)) {
                $this->items[$k] = $recipient;
                return;
            }
        }
        $this->items[$this->index] = $recipient;
        $this->index++;
    }

    public function remove(Recipient $recipient): void
    {
        foreach ($this->items as $k => $item) {
            if ($this->getUniqueKey($item) === $this->getUniqueKey($recipient)) {
                unset($this->items[$k]);
            }
        }
    }

    public function current(): Recipient
    {
        if (!$this->valid()) {
            throw new RuntimeException('no current element');
        }
        return $this->items[$this->cursor];
    }

    public function next(): void
    {
        do {
            $this->cursor++;
        } while (!array_key_exists($this->cursor, $this->items) && $this->cursor <= $this->index);
    }

    public function key(): int
    {
        return $this->cursor;
    }

    public function valid(): bool
    {
        return array_key_exists($this->cursor, $this->items);
    }

    public function rewind(): void
    {
        $this->cursor = -1;
        $this->next();
    }

    public function count(): int
    {
        return count($this->items);
    }

    private function getUniqueKey(Recipient $recipient): string
    {
        return $recipient->getEmail()->getAddress();
    }
}
