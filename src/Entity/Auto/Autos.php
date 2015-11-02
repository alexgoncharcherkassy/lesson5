<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 31.10.15
 * Time: 16:35
 */

namespace Entity\Auto;

/**
 * Class Autos
 * @package Entity\Auto
 */
class Autos extends AbstractAuto implements getVarsInterface
{
    protected $code;
    protected $price;

    /**
     * @param $code
     * @param $price
     */
    public function __construct($code, $price)
    {
        $this->code = $code;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        $arr = array(
            'class' => 'Autos',
            'code' => $this->getCode(),
            'price' => $this->getPrice()
        );

        return $arr;
    }

}
