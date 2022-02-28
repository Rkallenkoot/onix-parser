<?php

namespace Ribal\Onix\Product;

use Ribal\Onix\CodeList\CodeList17;
use Ribal\Onix\Text;

class Contributor
{

    private const CODE_AUTHOR = 'A01';

    public function __construct(
        public int $SequenceNumber,
        public CodeList17 $ContributorRole,
        public array $NameIdentifiers = [],
        public ?string $NamesBeforeKey = null,
        public ?string $BiographicalNote = null,
        public ?string $KeyNames = null,
    )
    {

    }

    /**
     * Set SequenceNumber
     *
     * @param int $SequenceNumber
     * @return void
     */
    public function setSequenceNumber(string $SequenceNumber)
    {
        $this->SequenceNumber = $SequenceNumber;
    }

    /**
     * Set ContributorRole
     *
     * @param string $ContributorRole
     * @return void
     */
    public function setContributorRole(CodeList17 $ContributorRole)
    {
        $this->ContributorRole = $ContributorRole;
    }

    /**
     * Add NameIdentifier
     *
     * @param NameIdentifier $NameIdentifier
     * @return void
     */
    public function setNameIdentifier(NameIdentifier $NameIdentifier)
    {
        $this->NameIdentifiers[] = $NameIdentifier;
    }

    /**
     * Set NamesBeforeKey
     *
     * @param string $NamesBeforeKey
     * @return void
     */
    public function setNamesBeforeKey(string $NamesBeforeKey)
    {
        $this->NamesBeforeKey = $NamesBeforeKey;
    }

    /**
     * Set KeyNames
     *
     * @param string $KeyNames
     * @return void
     */
    public function setKeyNames(string $KeyNames)
    {
        $this->KeyNames = $KeyNames;
    }

    /**
     * Set BiographicalNote
     *
     * @param string $BiographicalNote
     * @return void
     */
    public function setBiographicalNote(Text $BiographicalNote)
    {
        $this->BiographicalNote = $BiographicalNote;
    }

    /**
     * Get SequenceNumber
     *
     * @return int
     */
    public function getSequenceNumber()
    {
        return $this->SequenceNumber;
    }

    /**
     * Get ContributorRole
     *
     * @return CodeList
     */
    public function getContributorRole()
    {
        return $this->ContributorRole;
    }

    /**
     * Get NameIdentifiers
     *
     * @return array
     */
    public function getNameIdentifiers()
    {
        return $this->NameIdentifiers;
    }

    /**
     * Get NamesBeforeKey
     *
     * @return void
     */
    public function getNamesBeforeKey()
    {
        return $this->NamesBeforeKey;
    }

    /**
     * Get KeyNames
     *
     * @return string
     */
    public function getKeyNames()
    {
        return $this->KeyNames;
    }

    /**
     * Get BiographicalNote
     *
     * @return string
     */
    public function getBiographicalNote()
    {
        return $this->BiographicalNote;
    }

    /**
     * An alias function for getNamesBeforeKey
     *
     * @return string
     */
    protected function getFirstname()
    {
        return $this->getNamesBeforeKey();
    }

    /**
     * An alias for getKeyNames
     *
     * @return string
     */
    protected function getLastname()
    {
        return $this->getKeyNames();
    }

    /**
     * Determine if the contributor is an author
     *
     * @return boolean
     */
    protected function isAuthor()
    {
        return $this->ContributorRole->getCode() === self::CODE_AUTHOR;
    }

}
