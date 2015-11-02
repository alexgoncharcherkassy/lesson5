<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 31.10.15
 * Time: 16:41
 */

namespace Entity\Auto;

interface AutoInterface
{
    public function getModel();
    public function setModel($model);
    public function getColor();
    public function setColor($color);
    public function getCapacity();
    public function setCapacity($capacity);
}