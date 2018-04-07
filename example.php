<?php
include "bootstrap.php";

use AdelLock\Client;
use Adapters\FileAdapter;
use Entities\Room;
use Entities\Guest;

$fileAdapter = new FileAdapter('/tmp/adel-keys');
$adelClient =  new Client($fileAdapter);

$room = new Room(34534);
$guest = new Guest('Alex', 'White', new DateTime('2018-04-07T11:56'), new DateTime('2018-04-10T11:56'));

$adelClient->checkInNew('0112', $room, $guest);
$adelClient->checkInAdd('1232', $room, $guest);
$adelClient->checkOut('1232', $room);