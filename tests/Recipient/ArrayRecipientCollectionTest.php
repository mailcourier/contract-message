<?php

declare(strict_types=1);

namespace Tests\Postboy\Contract\Message\Recipient;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Postboy\Contract\Message\Recipient\ArrayRecipientCollection;
use Postboy\Contract\Message\Recipient\Recipient;
use Postboy\Email\Email;

class ArrayRecipientCollectionTest extends TestCase
{
    public function testAddAndRemove()
    {
        $collection = new ArrayRecipientCollection();
        $emails = [];
        for ($i = 1; $i <= 10; $i++) {
            $email = sprintf('test%\'.02d@phpunit.de', $i);
            $emails[$email] = $email;
        }

        foreach ($emails as $email) {
            $recipient = $this->createToRecipient($email);
            $collection->add($recipient);
        }
        Assert::assertCount(10, $collection);

        $tmpEmails = $emails;
        foreach ($collection as $recipient) {
            $email = $recipient->getEmail()->getAddress();
            if (array_key_exists($email, $tmpEmails)) {
                unset($tmpEmails[$email]);
            }
        }
        Assert::assertCount(0, $tmpEmails);

        foreach ($emails as $email) {
            $recipient = $this->createToRecipient($email);
            $collection->remove($recipient);
        }
        Assert::assertCount(0, $collection);
    }

    public function testReplaceRecipient()
    {
        $collection = new ArrayRecipientCollection();
        $email = 'test@phpunit.de';

        $recipientTo = $this->createToRecipient($email);
        $collection->add($recipientTo);
        Assert::assertCount(1, $collection);
        $collection->rewind();
        Assert::assertSame('to', strtolower($collection->current()->getType()));

        $recipientCc = $this->createCcRecipient($email);
        $collection->add($recipientCc);
        Assert::assertCount(1, $collection);
        $collection->rewind();
        Assert::assertSame('cc', strtolower($collection->current()->getType()));

        $recipientBcc = $this->createBccRecipient($email);
        $collection->add($recipientBcc);
        Assert::assertCount(1, $collection);
        $collection->rewind();
        Assert::assertSame('bcc', strtolower($collection->current()->getType()));
    }

    private function createToRecipient(string $email): Recipient
    {
        return Recipient::to(new Email($email));
    }

    private function createCcRecipient(string $email): Recipient
    {
        return Recipient::cc(new Email($email));
    }

    private function createBccRecipient(string $email): Recipient
    {
        return Recipient::bcc(new Email($email));
    }
}
