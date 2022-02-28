<?php

namespace Ribal\Onix\Message;

use Ribal\Onix\XmlIterator;

class Sender
{

    public function __construct(
        public ?string $SenderName = null,
        public ?string $ContactName = null,
        public ?string $EmailAddress = null,
    ) {
    }
}
