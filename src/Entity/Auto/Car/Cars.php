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

class Cars extends Autos implements AutoInterface
{
    protected $model;
    protected $color;
    protected $capacity;

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

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