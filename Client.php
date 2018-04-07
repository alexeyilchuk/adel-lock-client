<?php
namespace AdelLock;
use Entities\Room;
use Entities\Guest;

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
     */
    public function checkInNew($ddss, Room $room, Guest $guest)
    {
        $this->adapter->checkIn($ddss, $room, $guest);
    }

    /**
     * Check in additional guest.
     * @param $ddss
     * @param Room $room
     * @param Guest $guest
     */
    public function checkInAdd($ddss, Room $room, Guest $guest)
    {
        $this->adapter->checkIn($ddss, $room, $guest, false);
    }

    /**
     * Check out guest.
     * @param $ddss
     * @param Room $room
     */
    public function checkOut($ddss, Room $room)
    {
        $this->adapter->checkOut($ddss, $room);
    }

    /**
     * Read card by $ddss
     * @param $ddss
     */
    public function readCard($ddss)
    {
        $this->adapter->getRead;
    }

    /**
     * Get response
     */
    public function getResponse()
    {
        $this->adapter->getResponse();
    }
}