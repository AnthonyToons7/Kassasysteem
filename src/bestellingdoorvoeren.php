<?php

namespace Acme;

use Acme\classes\Bestelling;

require "../vendor/autoload.php";

if ($idTafel = $_POST['idtafel'] ?? false) {

    // TODO: De bestelling doorvoeren in de database (maak gebruik van de Bestelling class)

    $order = new Bestelling();
    $table = 

} else {
    http_response_code(404);
    include('error_404.php');
    die();
}

header("Location: index.php");
