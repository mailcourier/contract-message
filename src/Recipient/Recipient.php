<?php

declare(strict_types=1);

namespace Postboy\Contract\Message\Recipient;

use Postboy\Email\Email;

class Recipient
{
    private Email $email;
    private string $type;

    final public static function to(Email $email): self
    {
        return new static($email, 'To');
    }

    final public static function cc(Email $email): self
    {
        return new static($email, 'Cc');
    }

    final public static function bcc(Email $email): self
    {
        return new static($email, 'Bcc');
    }

    private function __construct(Email $email, string $type)
    {
        $this->email = $email;
        $this->type = $type;
    }

    final public function getEmail(): Email
    {
        return $this->email;
    }

    final public function getType(): string
    {
        return $this->type;
    }
}
