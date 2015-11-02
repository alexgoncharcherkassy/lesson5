<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 01.11.15
 * Time: 10:28
 */
namespace Entity\Auto;

class Orders implements getVarsInterface
{
    protected $idClient;
    protected $idAuto;

    public function __construct($idClient, $idAuto)
    {
        $this->idClient = $idClient;
        $this->idAuto = $idAuto;
    }

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function getIdAuto()
    {
        return $this->idAuto;
    }

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