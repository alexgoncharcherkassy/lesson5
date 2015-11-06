<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 04.11.15
 * Time: 13:55
 */

namespace Tests;

use Entity\Auto\Autos;
use Layer\Manager\Manager;


/**
 * Class ManagerTest
 * @package Tests
 */
class ManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider analysisVarsProvider
     */
    public function testAnalysisVars($testEntity, $entity)
    {
        $vars = new Manager();
        $this->assertEquals($testEntity, $vars->analysisVars($entity));

    }

    public function testGetVars()
    {
        $vars = new Autos('123', '100');
        $arr = $vars->getVars();
        $this->assertArrayHasKey('class', $vars->getVars());
        $this->assertContains('123', $arr);
        $this->assertCount(3, $arr);
        $this->assertClassHasAttribute('price', 'Entity\Auto\Autos');

    }

    /*public function testSql()
    {
        $mock = $this->getMockBuilder('Layer\Manager\Manager')->getMock();
        $mock->method('sql')->willReturn(array('id' => 5));
   //     $this->assertEquals('5', $mock->sql());

        $vars = new Manager();
        $this->assertEquals('5', $vars->find(array('class' => 'Autos', 'price' => 5)));
    }*/

    /**
     * @dataProvider findProvider
     */
    /*public function testFind($testEntity, $entityName)
    {
        $mock = $this->getMock('Layer\Manager\Manager', array('sql'));
        $mock->expects($this->once())
            ->method('sql')
            ->will($this->returnValue($entityName));
        $find = new Manager();
        $w = $find->find($mock);
        $this->assertEquals($testEntity, $w);
      //  $this->assertEquals($testEntity, $find->find($entityName));
    }*/

    /**
     * @return array
     */
    public function analysisVarsProvider()
    {
        return [
            [
                ['table' => 'Autos', 'arrKey' => ['code', 'price'], 'arrVal' => [123, 100]],
                ['class' => 'Autos', 'code' => 123, 'price' => 100]
            ],
            [
                ['table' => 'Autos', 'arrKey' => ['code', 'price'], 'arrVal' => [123, 100]],
                ['class' => 'Autos', 'code' => 123, 'price' => 100]
            ]

        ];
    }

    /*public function findProvider()
    {
        return [
            [
                72,
                ['id' => 72]
            ],

        ];
    }*/
}

