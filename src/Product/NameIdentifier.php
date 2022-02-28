<?php

namespace Ribal\Onix\Product;

use Ribal\Onix\CodeList\CodeList44;

class NameIdentifier
{

    public function __construct(
        protected CodeList44 $NameIDType,
        protected ?string $IDTypeName = null,
        protected ?string $IDValue = null,
    ) { }

    /**
     * Set NameIDType
     *
     * @param  string $NameIDType
     * @return void
     */
    public function setNameIDType(CodeList44 $NameIDType)
    {
        $this->NameIDType = $NameIDType;
    }

    /**
     * Set IDTypeName
     *
     * @param  string $IDTypeName
     * @return void
     */
    public function setIDTypeName(string $IDTypeName)
    {
        $this->IDTypeName = $IDTypeName;
    }

    /**
     * Set IDValue
     *
     * @param  string $IDValue
     * @return void
     */
    public function setIDValue(string $IDValue)
    {
        $this->IDValue = $IDValue;
    }

    /**
     * Get NameIDType
     *
     * @return CodeList
     */
    public function getNameIDType()
    {
        return $this->NameIDType;
    }

    /**
     * IDTypeName
     *
     * @return string
     */
    public function getIDTypeName()
    {
        return $this->IDTypeName;
    }

    /**
     * Get IDValue
     *
     * @return string
     */
    public function getIDValue()
    {
        return $this->IDValue;
    }

}
