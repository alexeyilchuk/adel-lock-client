<?php
namespace AdelLock\Adapters;
use AdelLock\Exceptions\AdelException;

/**
 * Class AbstractAdapter
 * @package Adapters
 */
abstract class AbstractAdapter
{
    /**
     * Control characters map.
     * @var array
     */
    protected $ccMap;

    /**
     * Command codes map.
     * @var array
     */
    protected $commandCodesMap;

    /**
     * Field codes map
     * @var array
     */
    protected $fieldsMap;

    /**
     * AbstractAdapter constructor.
     */
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

    /**
     * Validate ddss: dd - target address ss - source address
     * @param $ddss
     * @throws \Exception
     */
    protected function validateDdSs($ddss)
    {
        if (!preg_match('/\d{4}/', $ddss)) {
            throw new AdelException(sprintf('ddss -(target address, source address) parameter is invalid. Expected 4 digit value, but got %s', $ddss));
        }
    }
}