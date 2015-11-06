<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 31.10.15
 * Time: 16:32
 */

namespace Entity\Auto;

/**
 * Class AbstractAuto
 * @package Entity\Auto
 */
abstract class AbstractAuto
{
    /**
     * @return mixed
     */
    abstract function getCode();

    /**
     * @return mixed
     */
    abstract function getPrice();

}
