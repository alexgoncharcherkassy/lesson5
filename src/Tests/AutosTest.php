<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 06.11.15
 * Time: 20:19
 */

namespace Tests;

use Entity\Auto\Autos;

/**
 * Class AutosTest
 * @package Tests
 */
class AutosTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetVars()
    {
        $vars = new Autos('123', '100');
        $arr = $vars->getVars();
        $this->assertArrayHasKey('class', $vars->getVars());
        $this->assertContains('123', $arr);
        $this->assertCount(3, $arr);
        $this->assertClassHasAttribute('price', 'Entity\Auto\Autos');

    }

}
