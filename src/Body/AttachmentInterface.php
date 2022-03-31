<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Body;

use Postboy\Contract\Message\Body\BodyPartInterface;
use Postboy\Contract\Message\Type\Filename;

interface AttachmentInterface extends BodyPartInterface
{
    public function getFilename(): Filename;
}
