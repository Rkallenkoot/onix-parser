<?php

namespace Ribal\Onix\Product;

use Ribal\Onix\CodeList\CodeList44;

class RecordSourceIdentifier
{

    public function __construct(
        public CodeList44 $RecordSourceIDType,
        public string $IDValue,
    ) {}

}
