<?php

namespace Acme;

use Acme\model\ProductModel;

require "../vendor/autoload.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="bestellingdoorvoeren.php" method="post">
    <?php

    // QUESTION: Wat doet ?? in de code-regel hier onder?
    // Antwoord:
    $idTafel = $_GET['idtafel'] ?? false;
    if ($idTafel) {
        echo "<input type='hidden' name='idtafel' value='$idTafel'>";

        // TODO: alle producten ophalen uit de database en als inputs laten zien (maak gebruik van ProductModel class)
        // Zoiets als dit:
        $class = new ProductModel();
        $products = $class->getProducts();

        $index = 0;
    
        foreach ($products as $product) {
            echo '<pre>';
            echo "<div>";
            echo "<label><input type='checkbox' name='products[]' value='{$product->getColumnValue('idproduct')}'>{$product->getColumnValue('naam')}</label>";
            echo " <label>Aantal:<input type='number' name='product{$product->getColumnValue('idproduct')}'></label><br>";
            echo `<h1>Prijs:`.$product->getColumnValue('prijs').`</h1>`;
            echo "</div>";
            
            
            // $productss = $products[$index]->getColumnValue('idproduct');
            // echo "<div>";
            // echo "<label><input type='checkbox' name='products[]' value='{$class->getProduct($productss)["idproduct"]}'>{$class->getProduct($productss)["naam"]}</label>";
            // echo " <label>Aantal:<input type='number' name='product{$class->getProduct($productss)["idproduct"]}'></label>";
            // echo "</div>";
            // $index++;
        }
        echo "<button>Volgende</button>";
    } else {
        // QUESTION: Wat gebeurt hier?
        // Antwoord:
        http_response_code(404);
        include('error_404.php');
        die();
    }
    ?>

</form>
</body>
</html>
