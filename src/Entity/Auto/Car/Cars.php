<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 31.10.15
 * Time: 16:39
 */

namespace Entity\Auto\Car;

use Entity\Auto\AutoInterface;
use Entity\Auto\Autos;

/**
 * Class Cars
 * @package Entity\Auto\Car
 */
class Cars extends Autos implements AutoInterface
{
    protected $model;
    protected $color;
    protected $capacity;

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        $arr = array(
            'class' => 'Cars',
            'code' => $this->getCode(),
            'model' => $this->getModel(),
            'color' => $this->getColor(),
            'capacity' => $this->getCapacity(),
            'price' => $this->getPrice()
        );
        return $arr;
    }
}