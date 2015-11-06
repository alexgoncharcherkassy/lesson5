<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 04.11.15
 * Time: 13:29
 */
namespace Entity\Tests;

use Layer\Manager\Manager;

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

    public function analysisVarsProvider()
    {
        return [
            [
                ['table' => 'Autos', 'arrKey' => ['code', 'price'], 'arrVal' => [123, 100]],
                ['class' => 'Autos', 'code' => 123, 'price' => 100]
            ]
        ]
    }
}
