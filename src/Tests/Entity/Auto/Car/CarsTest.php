<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 06.11.15
 * Time: 20:42
 */

namespace Tests\Entity\Auto\Car;

use Entity\Auto\Car\Cars;

/**
 * Class CarsTest
 * @package Tests
 */
class CarsTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetVars()
    {
        $vars = new Cars('123', '100');
        $vars->setModel('bmw');
        $vars->setColor('red');
        $vars->setCapacity('250');
        $arr = $vars->getVars();
        $this->assertArrayHasKey('class', $vars->getVars());
        $this->assertContains('123', $arr);
        $this->assertCount(6, $arr);
        $this->assertClassHasAttribute('price', 'Entity\Auto\Car\Cars');

    }

}

