<?php

require __DIR__ . '/../config/autoload.php';

use Entity\Auto\Autos;
use Entity\Auto\Car\Cars;
use Entity\Auto\Clients;
use Entity\Auto\Orders;
use Layer\Manager\Manager;

$manager = new Manager();
$manager->connect($config);

$auto = new Autos('123', '1200');
$manager->insert($auto->getVars());
$car = new Cars('123', '1200');
$car->setModel('audi');
$car->setColor('black');
$car->setCapacity('300');
$manager->insert($car->getVars());

$clients = new Clients('tomy', 'read', '6658525');
$manager->insert($clients->getVars());
$manager->remove(array('class' => 'Clients', 'id' => '2'));
$manager->update(array('class' => 'Clients', 'id' => '7', 'firstName' => 'james'));

$find = $manager->find(array('class' => 'Clients', 'firstName' => 'tomy'));
echo 'Search id client tomy --# ';
echo $find . '<br/>';

$findAll = $manager->findAll(array('class' => 'Clients', 'firstName' => 'tom'));

echo '<br/>';
echo 'Search all clients by key and value client tom<br/>';
for ($i = 0; $i < count($findAll); $i++) {
    for ($j = 0; $j < count($findAll[$i]); $j++) {
        echo '--'.$findAll[$i][$j].'<br/>';
    }

    echo '<br/>';
}
echo '<br/>';
$orders = new Orders('4', '2');
$manager->insert($orders->getVars());
$findBy = $manager->findBy(array('class' => 'Orders', 'idClient' => '1', 'idAuto' => '1'));
echo 'Search oders by criteries(idClient(1) and idAuto(1))<br/>';
for ($i = 0; $i < count($findBy); $i++) {
    for ($j = 0; $j < count($findBy[$i]); $j++) {
        echo '--'.$findBy[$i][$j] . '<br/>';
    }

    echo '<br/>';
}

echo 'Search Cars.id = Orders.idAuto<br/>';
$findOrder = $manager->findOrder('3');
for ($i = 0;$i < count($findOrder);$i++) {
    echo print_r($findOrder[$i]).'<br/>';
}

echo 'Search clients customers who do not have orders ';
$findClient = $manager->findClient();
for ($i = 0;$i < count($findClient);$i++) {
    echo print_r($findClient[$i]).'<br/>';
}
