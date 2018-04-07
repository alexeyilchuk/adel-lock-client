<?php
namespace Adapters;

use AdelLock\AdelAdapterInterface;
use Entities\Guest;
use Entities\Room;

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

        return $this->writeFile($str, ($isNew ? 'check_in' : 'check_in_add'));
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

        return $this->writeFile($str, 'check_out');
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
     * @param string $namePrefix
     * @return string
     * @throws \Exception
     */
    private function writeFile($str, $namePrefix = '')
    {
        $fileId = $namePrefix . '_' . sha1($str);
        $filename = $this->outputFolder . '/' . $fileId . '.REQ';
        if (false === file_put_contents($filename, $str)) {
            throw new \Exception('Unable to write file');
        }

        return $fileId;
    }
}