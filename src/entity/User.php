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
     * @var   int
     * @since 1.0
     */
    private $id;

    /**
     * @var   string
     * @since 1.0
     */
    private $firstName;

    /**
     * @var   string
     * @since 1.0
     */
    private $lastName;

    /**
     * @var   int
     * @since 1.0
     */
    private $gender;

    /**
     * @var   string
     * @since 1.0
     */
    private $namePrefix;

    /**
     * @var   int
     * @since 1.0
     */
    const GENDER_MALE = 0;

    /**
     * @var  int
     * @since 1.0
     */
    const GENDER_FEMALE = 1;

    /**
     * @var   string
     * @since 1.0
     */
    const GENDER_MALE_DISPLAY_VALUE = 'Mr.';

    /**
     * @var   string
     * @since 1.0
     */
    const GENDER_FEMALE_DISPLAY_VALUE = 'Mrs.';

    /**
     * return string
     * @since 1.0
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
     * @since  1.0
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     * @since  1.0
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $firstName
     * @return void
     * @since  1.0
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     * @since  1.0
     */
    public function getFirstname()
    {
        return $this->firstName;
    }

    /**
     * @param  string $lastName
     * @return void
     * @since  1.0
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     * @since  1.0
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param  int $gender
     * @return void
     * @since  1.0
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return int
     * @since  1.0
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param  string $namePrefix
     * @return void
     * @since  1.0
     */
    public function setNamePrefix($namePrefix)
    {
        $this->namePrefix = $namePrefix;
    }

    /**
     * @return string
     * @since  1.0
     */
    public function getNamePrefix()
    {
        return $this->namePrefix;
    }
}
