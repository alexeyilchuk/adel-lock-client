<?php
namespace AdelLock\Adapters;

use AdelLock\AdelAdapterInterface;
use AdelLock\Entities\Guest;
use AdelLock\Entities\Room;
use AdelLock\Exceptions\AdelException;

/**
 * Class FileAdapter
 * @package Adapters
 */
class FileAdapter extends AbstractAdapter implements AdelAdapterInterface
{
    /**
     * @var
     */
    private $outputFolder;

    /**
     * FileAdapter constructor.
     * @param $outputFolder
     */
    public function __construct($outputFolder)
    {
        parent::__construct();
        $this->outputFolder = $outputFolder;
    }

    /**
     * Write check in file.
     * @param string $ddss
     * @param Room $room
     * @param Guest $guest
     * @param bool $isNew
     * @return string written file id (clear name)
     */
    public function checkIn($ddss, Room $room, Guest $guest, $isNew = true)
    {
        $this->validateDdSs($ddss);
        $str = $this->ccMap['start']
            . $ddss . ($isNew ? $this->commandCodesMap['check_in_new'] : $this->commandCodesMap['check_in_add'])
            . $this->ccMap['sep'] . $this->fieldsMap['room_number'] . $room->getNumber()
            . $this->ccMap['sep'] . $this->fieldsMap['guest_name'] . $guest->getFullName()
            . $this->ccMap['sep'] . $this->fieldsMap['check_in_time'] . $guest->getCheckInTime()->format('Ymdhm')
            . $this->ccMap['sep'] . $this->fieldsMap['check_out_time'] . $guest->getCheckOutTime()->format('Ymdhm')
            . $this->ccMap['end']
        ;

        return $this->writeFile($str, $ddss);
    }

    /**
     * Write checkout file.
     * @param $ddss
     * @param Room $room
     * @return string
     */
    public function checkOut($ddss, Room $room)
    {
        $this->validateDdSs($ddss);
        $str = $this->ccMap['start']
            . $ddss . $this->commandCodesMap['check_out']
            . $this->ccMap['sep'] . $this->fieldsMap['room_number'] . $room->getNumber()
            . $this->ccMap['end']
        ;

        return $this->writeFile($str, $ddss);
    }

    /**
     * Read card.
     * @param $ddss
     * @return null
     */
    public function readCard($ddss)
    {
        // TODO: Implement readCard() method.
    }

    /**
     * Get response
     */
    public function getResponse()
    {
        // TODO: Implement getResponse() method.
    }

    /**
     * Write data to file with unique filename/
     * @param $str
     * @param string $ddss
     * @return string
     * @throws \Exception
     */
    private function writeFile($str, $ddss)
    {
        //@TODO: move file name as parameter
        $fileId = substr($ddss, 0, 2) . '_' . date('H_i_s');
        $filename = sprintf("%s/%s.REQ", $this->outputFolder, $fileId);
        if (false === file_put_contents($filename, $str)) {
            throw new AdelException(sprintf('Unable to write file: %s', $filename));
        }

        return $fileId;
    }
}