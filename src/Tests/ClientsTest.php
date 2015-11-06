<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 06.11.15
 * Time: 20:38
 */

namespace Tests;

use Entity\Auto\Clients;

/**
 * Class ClientsTest
 * @package Tests
 */
class ClientsTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetVars()
    {
        $vars = new Clients('nick', 'abe', '665577');
        $arr = $vars->getVars();
        $this->assertArrayHasKey('class', $vars->getVars());
        $this->assertContains('abe', $arr);
        $this->assertCount(4, $arr);
        $this->assertClassHasAttribute('contacts', 'Entity\Auto\Clients');

    }
}
