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

    /**
     *
     */
    public function testFind()
    {
        $mock = $this->getMock('Layer\Manager\Manager');
        $mock->expects($this->once())
            ->method('find')
            ->will($this->returnValue(array('id' => 5)));
        $res = $mock->find(array('class' => 'Autos', 'price' => 5));
        $this->assertEquals(array('id' => 5), $res);
    }

    /**
     *
     */
    public function testInsert()
    {
        $mock = $this->getMock('Layer\Manager\Manager');
        $mock->expects($this->once())
            ->method('insert')
            ->will(($this->returnValue(('true'))));
        $mock->insert(array('class' => 'Autos', 'code' => 100, 'price' => 2300));
        $this->assertTrue(true);
    }

    /**
     *
     */
    public function testUpdate()
    {
        $mock = $this->getMock('Layer\Manager\Manager');
        $mock->expects($this->once())
            ->method('update')
            ->will(($this->returnValue(('true'))));
        $mock->update(array('class' => 'Autos', 'id' => 5, 'code' => 'THIS_UPDATE'));
        $this->assertTrue(true);
    }

    /**
     *
     */
    public function testRemove()
    {
        $mock = $this->getMock('Layer\Manager\Manager');
        $mock->expects($this->once())
            ->method('remove')
            ->will(($this->returnValue(('true'))));
        $mock->remove(array('class' => 'Autos', 'id' => 5));
        $this->assertTrue(true);
    }

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

}

