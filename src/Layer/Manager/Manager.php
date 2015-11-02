<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 31.10.15
 * Time: 18:32
 */
namespace Layer\Manager;

use Layer\Connector\ConnectorInterface;

class Manager extends AbstractManager implements ConnectorInterface
{
    const AUTOS = 'CREATE TABLE IF NOT EXISTS Autos (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        code INT NOT NULL,
        price INT NOT NULL
        ) CHARACTER SET utf8;';
    const CARS = 'CREATE TABLE IF NOT EXISTS Cars (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        code INT NOT NULL,
        model CHAR(100) NOT NULL,
        color CHAR(50) NOT NULL,
        capacity FLOAT NOT NULL,
        price FLOAT NOT NULL
        ) CHARACTER SET utf8;';
    const CLIENTS = 'CREATE TABLE IF NOT EXISTS  Clients (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        firstName CHAR(50) NOT NULL,
        lastName CHAR(50) NOT NULL,
        contacts CHAR(100) NOT NULL
        ) CHARACTER SET utf8;';
    const ORDERS = 'CREATE TABLE IF NOT EXISTS Orders (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        idClient INT NOT NULL,
        idAuto INT NOT NULL
        ) CHARACTER SET utf8;';

    protected $db;

    public function connect($host)
    {
        $localhost = $host['host'];
        $dbname = $host['db_name'];
        $user = $host['db_user'];
        $password = $host['db_password'];
        $this->db = new \PDO("mysql: host=$localhost;dbname=$dbname", $user, $password);

    }

    public function connectClose()
    {
        $this->db = null;
    }

    /**
     * Insert new entity data to the DB
     * @param mixed $entity
     * @return mixed
     */
    private function analysisVars($entity)
    {
        $arrVal = array();
        $arrKey = array();
        $table = '';
        foreach ($entity as $key => $value) {
            if ($key == 'class') {
                $table = $value;
                continue;
            }
            $arrVal[] = $value;
            $arrKey[] = $key;
        }

        return ['table' => $table, 'arrKey' => $arrKey, 'arrVal' => $arrVal];
    }

    public function insert($entity)
    {
        $vars = $this->analysisVars($entity);
        $table = $vars['table'];
        $this->createTable($table);
        $count = count($vars['arrVal']);
        $sql = "INSERT INTO $table VALUES (NULL";
        for ($i = 0; $i < $count; $i++) {
            $sql .= ' ,?';
        }
        $sql .= ')';
        $stm = $this->db->prepare($sql);
        for ($y = 0; $y < $count; $y++) {
            $stm->bindParam($y + 1, $vars['arrVal'][$y]);
        }
        $stm->execute();
        return;
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($entity)
    {
        $vars = $this->analysisVars($entity);
        $table = $vars['table'];
        $key = "`" . str_replace("`", "``", $vars['arrKey'][1]) . "`";
        $value = $vars['arrVal'][1];
        $id = $vars['arrVal'][0];
        $sql = "UPDATE $table SET $key = ? WHERE id = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $value);
        $stm->bindParam(2, $id);
        $stm->execute();
    }

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity)
    {
        $vars = $this->analysisVars($entity);
        $table = $vars['table'];
        $id = $vars['arrVal'][0];
        $sql = "DELETE FROM $table WHERE id = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $id);
        $stm->execute();

    }

    /**
     * Search entity data in the DB by Id
     * @param $entityName
     * @return mixed
     */
    public function find($entityName)
    {
        $vars = $this->analysisVars($entityName);
        $table = $vars['table'];
        $key = $vars['arrKey'][0];
        $value = $vars['arrVal'][0];
        $sql = "SELECT id FROM $table WHERE $key = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $value);
        $stm->execute();
        while ($row = $stm->fetch()) {
            $result = $row['id'];
        }

        return $result;
    }

    /**
     * Search all entity data in the DB
     * @param $entityName
     * @return array
     */
    public function findAll($entityName)
    {
        $vars = $this->analysisVars($entityName);
        $table = $vars['table'];
        $key = $vars['arrKey'][0];
        $value = $vars['arrVal'][0];
        $sql = "SELECT * FROM $table WHERE $key = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $value);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_NUM);

        return $result;
    }

    /**
     * Search all entity data in the DB like $criteria rules
     * @param $entityName

     * @return mixed
     */
    public function findBy($entityName)
    {
        $vars = $this->analysisVars($entityName);
        $table = $vars['table'];
        $key = $vars['arrKey'][0];
        $value = $vars['arrVal'][0];
        $key1 = $vars['arrKey'][1];
        $value1 = $vars['arrVal'][1];
        $sql = "SELECT * FROM $table WHERE $key = ? AND $key1 = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $value);
        $stm->bindParam(2, $value1);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_NUM);

        return $result;
    }

    public function findOrder($id)
    {
        $sql = 'SELECT Orders.id FROM Autos INNER JOIN Orders ON Autos.id = Orders.idAuto WHERE Autos.id = ?';
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $id);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_NUM);

        return $result;
    }

    public function findClient()
    {
        $sql = 'SELECT Clients.firstName FROM Clients LEFT OUTER JOIN Orders ON Clients.id = Orders.idClient WHERE Orders.idClient is NULL';
        $stm = $this->db->prepare($sql);
    //    $stm->bindParam(1, $id);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_NUM);

        return $result;
    }

    public function createTable($table)
    {
        //   $vars = $this->analysisVars($entity);
        $sql = '';
        switch ($table) {
            case 'Autos':
                $sql = self::AUTOS;
                break;
            case 'Cars':
                $sql = self::CARS;
                break;
            case 'Clients':
                $sql = self::CLIENTS;
                break;
            case 'Orders':
                $sql = self::ORDERS;
                break;
            default:
                echo 'ERROR';
        }

        if ($this->db->exec($sql)) {
            return true;
        }
        return false;
    }

    public function viewTableAutos()
    {
        $sql = "SELECT * FROM Autos";
        $stm = $this->db->prepare($sql);
        $stm->execute();
       // echo '<table class="table">';
        while ($row = $stm->fetch()) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td><a href="index1.php?code='.$row['code'].'&price='.$row['price'].'">'.$row['code'].'</td>';
            echo '<td>'.$row['price'].'</td>';
            echo '</td>';
        }
    //    echo '</table>';
    }

    public function __destruct()
    {
        $this->connectClose();
    }
}
