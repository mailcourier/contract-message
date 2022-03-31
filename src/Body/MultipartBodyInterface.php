<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Body;

use Postboy\Contract\Message\Body\Collection\BodyCollectionInterface;

interface MultipartBodyInterface extends BodyInterface
{
    public function getBoundary(): string;

    public function getParts(): BodyCollectionInterface;
}
