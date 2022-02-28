<?php

namespace Ribal\Onix\Product;

use Ribal\Onix\CodeList\CodeList15;

class TitleDetail
{

    public function __construct(
        public CodeList15 $TitleType,
        public array $TitleElement = [],
    ) {}

    /**
     * Add TitleElement
     *
     * @param TitleElement $TitleElement
     * @return void
     */
    public function addTitleElement(TitleElement $TitleElement)
    {
        $this->TitleElement[] = $TitleElement;
    }

    /**
     * Remove TitleElement
     *
     * @param TitleElement $TitleElement
     * @return void
     */
    public function removeTitleElement(TitleElement $TitleElement)
    {
    }

    /**
     * Get TitleElements
     *
     * @return void
     */
    public function getTitleElement()
    {
        return $this->TitleElement;
    }

}
