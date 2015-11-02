<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 01.11.15
 * Time: 15:49
 */
require __DIR__ . '/../config/autoload.php';

use Entity\Auto\Autos;
use Entity\Auto\Car\Cars;
//use Entity\Auto\Clients;
//use Entity\Auto\Orders;
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
       .leftPanel {
           box-sizing: border-box;
           height: 100%;
           width: 49%;
           float: left;
           border-right: 1px solid black;
       }
       .rightPanel {
           box-sizing: border-box;
           height: 100%;
           width: 49%;
           float: right;
           border-left: 1px solid black;
       }

        .table, tr, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .Autos {
            width: 40%;
        }
    </style>
</head>
<body>
<div class="leftPanel">
    <form action="index1.php" method="post" class="Autos">
        <label for="code">Enter the product code</label><br/>
        <input type="text" name="code" value="<?php echo $_GET['code']?>"><br/>
        <label for="price">Enter the price of product</label><br/>
        <input type="text" name="price" value="<?php echo $_GET['price']?>"><br/>
        <input type="submit" value="Save">
    </form>
    <?php

    $autos = new Autos($_POST['code'], $_POST['price']);
    $manager->insert($autos->getVars());
 //   $manager->viewTable('Autos');

    if (isset($_GET['code'])) {
        echo <<<EOF
        <form action = "index1.php" method = "post" class="Cars" >
        <input type="hidden" name="code" value="<?php echo {$_GET['code']}?>">
        <input type="hidden" name="price" value="<?php echo {$_GET['price']}?>">
        <label for="model" > Enter the model of product </label ><br />
        <input type = "text" name = "model" ><br />
        <label for="color" > Enter the color of product </label ><br />
        <input type = "text" name = "color" ><br />
        <label for="capacity" > Enter the capacity of product </label ><br />
        <input type = "text" name = "capacity" ><br />
        <input type = "submit" value = "Save" >
    </form >
EOF;
        $cars = new Cars('123', '200');
        $cars->setColor($_POST['color']);
        $cars->setModel($_POST['model']);
        $cars->setCapacity($_POST['capacity']);
        $manager->insert($cars->getVars());
    }
    ?>

    <table class="table">
        <th>#</th><th>Code</th><th>Price</th>
        <?php
        $manager->viewTableAutos();
        ?>
        </table>
    </div>

<div class="rightPanel">
    <form action="index1.php" method="post">
        <label for="firstName">Enter the name of the client</label><br/>
        <input type="text" name="firstName"><br/>
        <label for="lastName">Enter the surname of the client</label><br/>
        <input type="text" name="lastName"><br/>
        <label for="contacts">Enter your phone number the client</label><br/>
        <input type="text" name="contacts"><br/>
        <input type="submit" value="Save">
    </form>
    <?php
  //  $manager->viewTable('Autos');
    ?>
    </div>
</body>
</html>
