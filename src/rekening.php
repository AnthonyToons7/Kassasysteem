<?php

namespace Acme;

use Acme\classes\Rekening;
require "../vendor/autoload.php";
$idTafel = $_GET['idtafel'] ?? null;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($idTafel) {
    ?>

    <link rel="stylesheet" href="css/style.css">

    <?php
        //TODO: bestelling ophalen en tonen op een mooie manier door gebruik te maken van Rekening.php
        $rekening = new Rekening($idTafel);
        $bill = $rekening->getBill($idTafel);
        $total = 0;
    ?>

    <div class="bill-container">
        <h1>Rekening</h1>
        <?php
            foreach ($bill["products"] as $product){
                $totalPrice = $product["data"]["prijs"] * $product["aantal"];
                //TODO: 'totaal' toevoegen aan de rekening
                $total +=$totalPrice;
                echo '<div class="bill-product">';
                echo '<p>'.$product["data"]["naam"].'</p>';
                echo '<p>x '.$product["aantal"].'</p>';
                echo '<p class="bill-amount">&euro;'.$totalPrice.'</p>';
                echo '</div>';
            }
            
            echo '<h3 id="subtotal">Subtotaal: &euro;'.$total.'</h3>';
        ?>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded",()=>{
            xhttp = new XMLHttpRequest();
            xhttp.open("POST", "setPaid.php?idtafel=<?=$idTafel?>", true);
            xhttp.send();
        })
    </script>

    <?php
        // $rekening->setPaid($idTafel);
        
} else {
    http_response_code(404);
    include('error_404.php');
    die();
}