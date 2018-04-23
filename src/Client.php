<?php
namespace AdelLock;
use AdelLock\Entities\Room;
use AdelLock\Entities\Guest;

/**
 * Class Client implements basic commands to the Adel Lock server
 * @package AdelLock
 */
class Client
{
    /**
     * @var AdelAdapterInterface
     */
    private $adapter;

    /**
     * Client constructor.
     * @param AdelAdapterInterface $adapter
     */
    public function __construct(AdelAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Check in new guest.
     * @param $ddss
     * @param Room $room
     * @param Guest $guest
     * @return string
     */
    public function checkInNew($ddss, Room $room, Guest $guest)
    {
        return $this->adapter->checkIn($ddss, $room, $guest);
    }

    /**
     * Check in additional guest.
     * @param $ddss
     * @param Room $room
     * @param Guest $guest
     * @return string
     */
    public function checkInAdd($ddss, Room $room, Guest $guest)
    {
        return $this->adapter->checkIn($ddss, $room, $guest, false);
    }

    /**
     * Check out guest.
     * @param $ddss
     * @param Room $room
     * @return string
     */
    public function checkOut($ddss, Room $room)
    {
        return $this->adapter->checkOut($ddss, $room);
    }

    /**
     * Read card by $ddss
     * @param $ddss
     * @return string
     */
    public function readCard($ddss)
    {
        return $this->adapter->readCard($ddss);
    }

    /**
     * Get response
     * @return string
     */
    public function getResponse()
    {
        return $this->adapter->getResponse();
    }
}