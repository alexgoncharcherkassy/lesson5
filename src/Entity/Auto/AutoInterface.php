<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 31.10.15
 * Time: 16:41
 */

namespace Entity\Auto;

/**
 * Interface AutoInterface
 * @package Entity\Auto
 */
interface AutoInterface
{
    /**
     * @return mixed
     */
    public function getModel();

    /**
     * @param $model
     * @return mixed
     */
    public function setModel($model);

    /**
     * @return mixed
     */
    public function getColor();

    /**
     * @param $color
     * @return mixed
     */
    public function setColor($color);

    /**
     * @return mixed
     */
    public function getCapacity();

    /**
     * @param $capacity
     * @return mixed
     */
    public function setCapacity($capacity);
}
