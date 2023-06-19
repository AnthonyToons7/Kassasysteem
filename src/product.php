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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-element selected" id="drink">Dranken</div>
        <div class="sidebar-element" id="soup">Soepen</div>
        <div class="sidebar-element" id="main-course">Hoofdgerechten</div>
        <div class="sidebar-element" id="dessert">Desserts</div>
        <div class="sidebar-element" id="other">Overig</div>
    </div>
    <div class="container-center">
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
            
                // CODE WITHOUT ADDITIONAL CLASSES
                // foreach ($products as $product) {
                //     echo "<div class='product'>";
                //     echo "<label><input type='checkbox' name='products[]' value='{$product->getColumnValue('idproduct')}'>{$product->getColumnValue('naam')}</label>";
                //     echo " <label>Aantal:<input type='number' name='product{$product->getColumnValue('idproduct')}'></label><br>";
                //     echo "<h2>&euro;".$product->getColumnValue('prijs')."</h2>";
                //     echo "</div>";
                // }

                    foreach ($products as $product) {
                        $productId = $product->getColumnValue('idproduct');
                        $additionalClass = '';
                    
                        if (in_array($productId, [2, 3, 4, 5, 6, 17])) {
                            $additionalClass = 'drink';
                        } elseif (in_array($productId, [7, 8])) {
                            $additionalClass = 'soup';
                        } elseif (in_array($productId, [9, 10, 18, 19, 20, 21])) {
                            $additionalClass = 'other';
                        } elseif (in_array($productId, [11, 12, 13, 14])) {
                            $additionalClass = 'main-course';
                        } elseif (in_array($productId, [15, 16])) {
                            $additionalClass = 'dessert';
                        }
                        echo "<div class='product {$additionalClass}'>";
                        echo "<label><input type='checkbox' name='products[]' value='{$product->getColumnValue('idproduct')}' class='product-checkbox'>{$product->getColumnValue('naam')}</label>";
                        echo " <label>Aantal:<input type='number' name='product{$product->getColumnValue('idproduct')}'></label><br>";
                        echo "<p>&euro;".$product->getColumnValue('prijs')."</p>";
                        echo "</div>";
                    }
                echo "<button class='button button-next'>Volgende</button>";
            } else {
                // QUESTION: Wat gebeurt hier?
                // Antwoord: Als de tafelId leeg is en/of niet bestaat, dan redirect deze code jou naar een pagina die je simpelweg laat zien dat de pagina niet gevonden is
                http_response_code(404);
                include('error_404.php');
                die();
            }
            ?>

        </form>
    </div>
        <script src="js/script.js"></script>
</body>
</html>
