<?php 
namespace Acme;

use Acme\model\TafelModel;

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toevoegen of afrekenen</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="top-line">
        <h1>Maak uw selectie</h1>
    </div>
    <div class="container-center">
        <?php
        $idTafel = $_GET['idtafel'] ?? false;
        if ($idTafel) {
            echo "<div class='button button-choice'><a href='product.php?idtafel={$idTafel}'>Bestelling maken</a></div>";
            echo "<div class='button button-choice'><a href='rekening.php?idtafel={$idTafel}'>Afrekenen</a></div>";
        } else {
            http_response_code(404);
            include('error_404.php');
            die();
        }
        ?>
    </div>
</body>
</html>