<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Body;

use Postboy\Contract\Message\Type\ContentId;

interface ContentInterface extends BodyPartInterface
{
    public function getContentId(): ContentId;
}
