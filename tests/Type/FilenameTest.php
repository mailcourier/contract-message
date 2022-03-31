<?php

declare(strict_types=1);

namespace Tests\Postboy\Contract\Message\Type;

use InvalidArgumentException;
use Postboy\Contract\Message\Type\Filename;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FilenameTest extends TestCase
{
    /**
     * @dataProvider provideValidValue
     */
    public function testValidValue(string $name, string $expected)
    {
        $filename = new Filename($name);
        Assert::assertSame($expected, (string)$filename);
    }

    /**
     * @dataProvider provideInvalidValue
     */
    public function testInvalidValue(string $name)
    {
        $this->expectException(InvalidArgumentException::class);
        new Filename($name);
    }

    public function provideValidValue(): iterable
    {
        return [
            ['file 1', 'file 1'],
            [' file 2 ', 'file 2'],
            ['file#3', 'file#3'],
            ['file(4)', 'file(4)'],
            ['кириллица', 'кириллица'],
        ];
    }

    public function provideInvalidValue(): iterable
    {
        return [
            ['file/1'],
            ['file*2'],
            ['file?3'],
            ['file<4'],
            ['file>5'],
            ['file\5'],
        ];
    }
}
