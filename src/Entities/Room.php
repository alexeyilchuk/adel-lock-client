<?php

namespace AdelLock\Entities;

/**
 * Class Room
 * @package Entities
 */
class Room
{
    /**
     * @var
     */
    private $number;

    /**
     * Room constructor.
     * @param $roomNumber
     */
    function __construct($roomNumber)
    {
        $this->number = $roomNumber;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

}