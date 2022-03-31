<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Body;

use Postboy\Contract\Message\Body\Stream\StreamInterface;

interface BodyPartInterface extends BodyInterface
{
    public function getStream(): StreamInterface;
}
