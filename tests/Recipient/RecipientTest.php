<?php

declare(strict_types=1);

namespace Tests\Postboy\Contract\Message\Recipient;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Postboy\Contract\Message\Recipient\Recipient;
use Postboy\Email\Email;

class RecipientTest extends TestCase
{
    public function testTo()
    {
        $email = $this->createEmail();
        $recipient = Recipient::to($email);
        Assert::assertSame($email, $recipient->getEmail());
        Assert::assertSame('to', strtolower($recipient->getType()));
    }

    public function testCc()
    {
        $email = $this->createEmail();
        $recipient = Recipient::cc($email);
        Assert::assertSame($email, $recipient->getEmail());
        Assert::assertSame('cc', strtolower($recipient->getType()));
    }

    public function testBcc()
    {
        $email = $this->createEmail();
        $recipient = Recipient::bcc($email);
        Assert::assertSame($email, $recipient->getEmail());
        Assert::assertSame('bcc', strtolower($recipient->getType()));
    }

    private function createEmail(): Email
    {
        return new Email('test@phpunit.de');
    }
}
