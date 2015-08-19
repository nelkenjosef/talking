<?php

namespace Entity;

/**
 * Entity User
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.0
 *
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var int
     */
    private $gender;

    /**
     * @var string
     */
    private $namePrefix;

    const GENDER_MALE = 0;
    const GENDER_FEMALE = 0;

    const GENDER_MALE_DISPLAY_VALUE = 'Mr.';
    const GENDER_FEMALE_DISPLAY_VALUE = 'Mrs.';

    /**
     * return string
     */
    public function assembleDisplayName()
    {
        $displayName = '';

        if (self::GENDER_MALE == $this->gender) {
            $displayName .= self::GENDER_MALE_DISPLAY_VALUE . ' ';
        } elseif (self::GENDER_FEMALE == $this->gender) {
            $displayName .= self::GENDER_FEMALE_DISPLAY_VALUE . ' ';
        }

        if ($this->namePrefix) {
            $displayName .= $this->namePrefix . ' ';
        }

        $displayName .= $this->firstName . ' ' . $this->lastName;

        return $displayName;
    }

    /**
     * @param  int $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstName;
    }

    /**
     * @param  string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param  int $gender
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param  string $namePrefix
     * @return void
     */
    public function setNamePrefix($namePrefix)
    {
        $this->namePrefix = $namePrefix;
    }

    /**
     * @return string
     */
    public function getNamePrefix()
    {
        return $this->namePrefix;
    }
}
