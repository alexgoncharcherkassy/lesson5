<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 06.11.15
 * Time: 20:45
 */

namespace Tests\Entity\Auto;

use Entity\Auto\Orders;

/**
 * Class OrdersTest
 * @package Tests
 */
class OrdersTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetVars()
    {
        $vars = new Orders('5', '7');
        $arr = $vars->getVars();
        $this->assertArrayHasKey('class', $vars->getVars());
        $this->assertContains('5', $arr);
        $this->assertCount(3, $arr);
        $this->assertClassHasAttribute('idAuto', 'Entity\Auto\Orders');

    }

}

