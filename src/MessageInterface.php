<?php

declare(strict_types=1);

namespace Postboy\Contract\Message;

use Postboy\Contract\Message\Body\BodyInterface;
use Postboy\Contract\Message\Recipient\Recipient;
use Postboy\Contract\Message\Recipient\RecipientCollection;

interface MessageInterface
{
    public function getRecipients(): RecipientCollection;

    public function addRecipient(Recipient $recipient): void;

    public function removeRecipient(Recipient $recipient): void;

    public function hasHeader(string $header): bool;

    public function getHeader(string $header): ?string;

    public function getHeaders(): iterable;

    public function setHeader(string $header, string $value): void;

    public function removeHeader(string $header): void;


    public function getBody(): BodyInterface;

    public function setBody(BodyInterface $body): void;
}
