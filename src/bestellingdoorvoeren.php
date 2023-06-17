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

    // // $_POST['products'] geeft een array van de product id's terug
    echo"<pre>";
    $order = new Bestelling($idTafel, $productIds);

    $order->addProducts($_POST['products']);
    var_dump($order->getBestelling());
    
    $index = 2; // Start index from 2 based on the dump provided
    while (isset($_POST['product'.$index])) {
        if ($_POST['product'.$index] !== ''){
            var_dump($_POST['product'.$index]);
            $order->saveBestelling();
        } 
        $index++;
    }
    
    die();
} else {
    http_response_code(404);
    include('error_404.php');
    die();
}

header("Location: index.php");
