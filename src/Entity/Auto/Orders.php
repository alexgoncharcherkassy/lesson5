<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 01.11.15
 * Time: 10:28
 */
namespace Entity\Auto;

/**
 * Class Orders
 * @package Entity\Auto
 */
class Orders implements getVarsInterface
{
    protected $idClient;
    protected $idAuto;

    /**
     * @param $idClient
     * @param $idAuto
     */
    public function __construct($idClient, $idAuto)
    {
        $this->idClient = $idClient;
        $this->idAuto = $idAuto;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @return mixed
     */
    public function getIdAuto()
    {
        return $this->idAuto;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        $arr = array(
            'class' => 'Orders',
            'idClient' => $this->getIdClient(),
            'idAuto' => $this->getIdAuto()
        );

        return $arr;
    }
}