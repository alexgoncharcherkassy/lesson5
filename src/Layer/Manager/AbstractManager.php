<?php

namespace Layer\Manager;

/**
 * Class AbstractManager
 * @package Layer\Manager
 */
abstract class AbstractManager implements ManagerInterface
{

    abstract public function insert($entity);

    abstract public function update($entity);

    abstract public function remove($entity);

    abstract public function find($entityName);

    abstract public function findAll($entityName);

    abstract public function findBy($entityName);

}

