<?php
namespace Adapters;

abstract class AbstractAdapter
{
    protected $ccMap;             // control characters map
    protected $commandCodesMap;   // command codes map
    protected $fieldsMap;         // field codes map

    public function __construct()
    {
        $this->ccMap = [
            'start' => chr(2),
            'end'   => chr(3),
            'sep'   => chr(124),
        ];
        $this->commandCodesMap = [
            'check_in_new' => 'I',
            'check_in_add' => 'G',
            'check_out'    => 'B',
            'verify'       => 'E',
        ];
        $this->fieldsMap = [
            'room_number'    => 'R',
            'guest_name'     => 'N',
            'check_in_time'  => 'D',
            'check_out_time' => 'O',

        ];
    }

    protected function validateDdSs($ddss)
    {
        if (!preg_match('/[0-9]{4}/', $ddss)) {
            throw new \Exception('ddss parameter is invlid');
        }
    }
}