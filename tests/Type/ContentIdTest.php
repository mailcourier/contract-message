<?php

declare(strict_types=1);

namespace Tests\Postboy\Contract\Message\Type;

use Postboy\Contract\Message\Type\ContentId;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ContentIdTest extends TestCase
{
    /**
     * @dataProvider provideValidValue
     */
    public function testValidValue(string $id, string $expected)
    {
        $contentId = new ContentId($id);
        Assert::assertSame($expected, (string)$contentId);
    }

    public function provideValidValue(): iterable
    {
        return [
            ['ok', 'ok'],
            ['value number two', 'value+number+two'],
            ['value[3]', 'value%5B3%5D'],
        ];
    }
}
