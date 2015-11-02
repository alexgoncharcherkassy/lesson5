<?php

namespace Layer\Manager;

/**
 * Class AbstractManager
 * @package Layer\Manager
 */
abstract class AbstractManager implements ManagerInterface
{

    /**
     * @param mixed $entity
     * @return mixed
     */
    abstract public function insert($entity);

    /**
     * @param $entity
     * @return mixed
     */
    abstract public function update($entity);

    /**
     * @param $entity
     * @return mixed
     */
    abstract public function remove($entity);

    /**
     * @param $entityName
     * @return mixed
     */
    abstract public function find($entityName);

    /**
     * @param $entityName
     * @return mixed
     */
    abstract public function findAll($entityName);

    /**
     * @param $entityName
     * @return mixed
     */
    abstract public function findBy($entityName);

}

