<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Body;

interface BodyInterface
{
    public function getContentType(): string;
}
