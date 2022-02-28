<?php

namespace Ribal\Onix\Product;

use Ribal\Onix\CodeList\CodeList79;
use Ribal\Onix\CodeList\CodeList98;

class ProductFormFeature
{

    public function __construct(
        public CodeList79 $ProductFormFeatureType,
        public CodeList98 $ProductFormFeatureValue,
        public string $ProductFormFeatureDescription,
    ) {}

}
