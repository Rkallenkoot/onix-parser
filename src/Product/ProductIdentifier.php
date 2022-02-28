<?php

namespace Ribal\Onix\Product;

use Symfony\Component\Serializer\Annotation\Ignore;
use Ribal\Onix\CodeList\CodeList5;


class ProductIdentifier
{
    protected const ISBN10_TYPE = "02";
    protected const ISBN13_TYPE = "15";

    public function __construct(
        public CodeList5 $ProductIDType,
        public string $IDValue,
    ) {}


    /**
     * Determine if idenfitier is ISBN10
     *
     * @return boolean
     */
    #[Ignore]
    protected function isISBN10()
    {
        return $this->ProductIDType->getCode() == self::ISBN10_TYPE;
    }

    /**
     * Determine if idenfitier is ISBN13
     *
     * @return boolean
     */
    #[Ignore]
    protected function isISBN13()
    {
        return $this->ProductIDType->getCode() == self::ISBN13_TYPE;
    }

}
