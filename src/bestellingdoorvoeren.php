<?php

namespace Acme;

use Acme\classes\Bestelling;

require "../vendor/autoload.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($idTafel = $_POST['idtafel'] ?? false) {

    $productIds = $_POST['products'];

    // TODO: De bestelling doorvoeren in de database (maak gebruik van de Bestelling class)
    echo"<pre>";
    $order = new Bestelling($idTafel, $productIds);

    $order->addProducts($productIds);
    var_dump($order->getBestelling());
    $order->getBestelling();
    foreach ($productIds as $product) {
        $index = 2;
        while (isset($_POST['product'.$index])) {
            if ($_POST['product'.$index] !== ''){
                for($asd=0;$asd<$_POST['product'.$index];$asd++){
                    $order->saveBestelling();
                }
            } 
            $index++;
        }
    }
    
    die();
} else {
    http_response_code(404);
    include('error_404.php');
    die();
}

header("Location: index.php");
