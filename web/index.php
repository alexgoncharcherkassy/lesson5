<?php

require __DIR__ . '/../config/autoload.php';

use Entity\Auto\Autos;
use Entity\Auto\Car\Cars;
use Entity\Auto\Clients;
use Entity\Auto\Orders;
use Layer\Manager\Manager;

$manager = new Manager();
$manager->connect($config);
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Database
    </title>
    <meta charset="utf-8">
    <style>
        html, body {
            height: 100%;
        }

        table, tr, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .left {
            height: 100%;
            width: 45%;
            float: left;
        }

        .right {
            height: 100%;
            width: 50%;
            float: right;
        }
    </style>
</head>
<body>
<div class="left">
    <h2>
        Enter Auto
    </h2>

    <form action="index.php" method="post">
        <label for="code">Enter the product code</label><br/>
        <input type="text" name="code"><br/>
        <label for="price">Enter the price of product</label><br/>
        <input type="text" name="price"><br/>
        <input type="submit" value="Save">
    </form>
    <?php
    $auto = new Autos($_POST['code'], $_POST['price']);
    $manager->insert($auto->getVars());
    $manager->viewTable($auto->getVars());
    $manager->remove(array('class' => 'Autos', 'id' => "{$_GET['idAutos']}"));
    $manager->update(array('class' => 'Autos', 'id' => "{$_GET['updAutos']}", 'code' => 'THIS_UPDATE'));
    ?>
    <h2>
        Enter Cars
    </h2>

    <form action="index.php" method="post">
        <label for="codecars">Enter the product code</label><br/>
        <input type="text" name="codecars" value="<?php echo $_POST['code'] ?>"><br/>
        <label for="pricecars">Enter the price of product</label><br/>
        <input type="text" name="pricecars" value="<?php echo $_POST['price'] ?>"><br/>
        <label for="model"> Enter the model of product </label><br/>
        <input type="text" name="model"><br/>
        <label for="color"> Enter the color of product </label><br/>
        <input type="text" name="color"><br/>
        <label for="capacity"> Enter the capacity of product </label><br/>
        <input type="text" name="capacity"><br/>
        <input type="submit" value="Save">
    </form>
    <?php
    $car = new Cars($_POST['cadecars'], $_POST['pricecars']);
    $car->setModel($_POST['model']);
    $car->setColor($_POST['color']);
    $car->setCapacity($_POST['capacity']);
    $manager->insert($car->getVars());
    $manager->viewTable($car->getVars());
    $manager->remove(array('class' => 'Cars', 'id' => "{$_GET['idCars']}"));
    $manager->update(array('class' => 'Cars', 'id' => "{$_GET['updCars']}", 'model' => 'THIS_UPDATE'));
    ?>
    <h2>
        Enter Clients
    </h2>

    <form action="index.php" method="post">
        <label for="firstName">Enter the name of the client</label><br/>
        <input type="text" name="firstName"><br/>
        <label for="lastName">Enter the surname of the client</label><br/>
        <input type="text" name="lastName"><br/>
        <label for="contacts">Enter your phone number the client</label><br/>
        <input type="text" name="contacts"><br/>
        <input type="submit" value="Save">
    </form>
    <?php
    $clients = new Clients($_POST['firstName'], $_POST['lastName'], $_POST['contacts']);
    $manager->insert($clients->getVars());
    $manager->viewTable($clients->getVars());
    $manager->remove(array('class' => 'Clients', 'id' => "{$_GET['idClients']}"));
    $manager->update(array('class' => 'Clients', 'id' => "{$_GET['updClients']}", 'firstName' => 'THIS_UPDATE'));
    ?>
    <h2>
        Enter Orders
    </h2>

    <form action="index.php" method="post">
        <label for="idClient">Enter id Client</label><br/>
        <input type="text" name="idClient"><br/>
        <label for="idAuto">Enter id Auto</label><br/>
        <input type="text" name="idAuto"><br/>
        <input type="submit" value="Save">
    </form>
    <?php
    $orders = new Orders($_POST['idClient'], $_POST['idAuto']);
    $manager->insert($orders->getVars());
    $manager->viewTable($orders->getVars());
    ?>
</div>
<div class="right">
    <h2>
        Find id client
    </h2>

    <form action="index.php" method="post">
        <label for="contact">Enter the contact client</label><br/>
        <input type="text" name="contact"><br/>
        <input type="submit" value="Search">
    </form>
    <?php
    $find = $manager->find(array('class' => 'Clients', 'contacts' => "{$_POST['contact']}"));
    echo 'Search id client -- ';
    echo $find . '<br/>';
    ?>
    <h2>
        Find all the clients by name
    </h2>

    <form action="index.php" method="post">
        <label for="first">Enter the first name client</label><br/>
        <input type="text" name="first"><br/>
        <input type="submit" value="Search">
    </form>
    <?php
    $findAll = $manager->findAll(array('class' => 'Clients', 'firstName' => "{$_POST['first']}"));

    echo '<br/>';
    echo 'Search all clients by key and value <br/>';
    for ($i = 0; $i < count($findAll); $i++) {
        for ($j = 0; $j < count($findAll[$i]); $j++) {
            echo '--' . $findAll[$i][$j] . '<br/>';
        }

        echo '<br/>';
    }
    echo '<br/>';
    ?>
    <h2>
        Find orders by criteries id
    </h2>

    <form action="index.php" method="post">
        <label for="client">Enter id client</label><br/>
        <input type="text" name="client"><br/>
        <label for="auto">Enter id auto</label><br/>
        <input type="text" name="auto"><br/>
        <input type="submit" value="Search">
    </form>
    <?php
    $findBy = $manager->findBy(array(
        'class' => 'Orders',
        'idClient' => "{$_POST['client']}",
        'idAuto' => "{$_POST['auto']}"
    ));
    echo 'Search oders by criteries(--idOrders --idClient --idAuto)<br/>';
    for ($i = 0; $i < count($findBy); $i++) {
        for ($j = 0; $j < count($findBy[$i]); $j++) {
            echo '--' . $findBy[$i][$j] . '<br/>';
        }

        echo '<br/>';
    }
    ?>
    <h2>
        Find id orders
    </h2>

    <form action="index.php" method="post">
        <label for="autoid">Enter id auto</label><br/>
        <input type="text" name="autoid"><br/>
        <input type="submit" value="Search">
    </form>
    <?php
    echo 'Search Cars.id = Orders.idAuto<br/>';
    $findOrder = $manager->findOrder($_POST['autoid']);
    for ($i = 0; $i < count($findOrder); $i++) {
        for ($j = 0; $j < count($findOrder[$i]); $j++) {
            echo '--' . $findOrder[$i][$j] . '<br/>';
        }
    }
    ?>
    <h2>
        Find id clients
    </h2>
    <?php
    echo 'Search clients customers who do not have orders <br/>';
    $findClient = $manager->findClient();
    for ($i = 0; $i < count($findClient); $i++) {
        for ($j = 0; $j < count($findClient[$i]); $j++) {
            echo '--' . $findClient[$i][$j] . '<br/>';
        }
    }
    ?>
</div>
</body>
</html>
