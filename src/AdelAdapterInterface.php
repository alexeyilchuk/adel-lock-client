<?php
namespace AdelLock;

use AdelLock\Entities\Guest;
use AdelLock\Entities\Room;

/**
 * Interface AdelAdapterInterface
 * @package AdelLock
 */
interface AdelAdapterInterface
{
    /**
     * Generate/send checkIn file/request
     * @param $ddss string 4 digit code that suits the following patter /[0-9]{4}/
     * @param Room $room
     * @param Guest $guest
     * @param $isNew
     * @return mixed
     */
    public function checkIn($ddss, Room $room, Guest $guest, $isNew = true);

    /**
     * Generate/Send checkout file/request
     * @param $ddss
     * @param Room $room
     * @return mixed
     */
    public function checkOut($ddss, Room $room);

    /**
     * Read key-card from Adel Lock system.
     * @param $ddss
     * @return mixed
     */
    public function readCard($ddss);

    /**
     * Get response from Adel Lock system.
     * @return mixed
     */
    public function getResponse();

}