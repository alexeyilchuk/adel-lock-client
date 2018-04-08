<?php
namespace AdelLock\Entities;

/**
 * Class Guest
 * @package Entities
 */
class Guest
{
    /**
     * @var
     */
    private $firstName;
    /**
     * @var
     */
    private $lastName;
    /**
     * @var \DateTime
     */
    private $checkInTime;
    /**
     * @var \DateTime
     */
    private $checkOutTime;

    /**
     * Guest constructor.
     * @param $firstName
     * @param $lastName
     * @param \DateTime $checkInTime
     * @param \DateTime $checkOutTime
     */
    public function __construct($firstName, $lastName, \DateTime $checkInTime, \DateTime $checkOutTime)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->checkInTime = $checkInTime;
        $this->checkOutTime = $checkOutTime;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return Guest
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return Guest
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return sprintf('% %', $this->firstName, $this->lastName);
    }

    /**
     * @return \DateTime
     */
    public function getCheckInTime(): \DateTime
    {
        return $this->checkInTime;
    }

    /**
     * @param \DateTime $checkInTime
     * @return Guest
     */
    public function setCheckInTime(\DateTime $checkInTime)
    {
        $this->checkInTime = $checkInTime;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCheckOutTime(): \DateTime
    {
        return $this->checkOutTime;
    }

    /**
     * @param \DateTime $checkOutTime
     * @return Guest
     */
    public function setCheckOutTime(\DateTime $checkOutTime)
    {
        $this->checkOutTime = $checkOutTime;
        return $this;
    }

}