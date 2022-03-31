<?php

declare(strict_types=1);

namespace Tests\Postboy\Contract\Message\Type;

use Postboy\Contract\Message\Type\MultipartType;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class MultipartTypeTest extends TestCase
{
    public function testMixed()
    {
        $multipartType = MultipartType::mixed();
        Assert::assertSame('multipart/mixed', (string)$multipartType);
    }

    public function testRelated()
    {
        $multipartType = MultipartType::related();
        Assert::assertSame('multipart/related', (string)$multipartType);
    }

    public function testAlternative()
    {
        $multipartType = MultipartType::alternative();
        Assert::assertSame('multipart/alternative', (string)$multipartType);
    }
}
