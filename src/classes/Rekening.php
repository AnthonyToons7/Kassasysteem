<?php

namespace Acme\classes;

use Acme\model\ProductModel;
use Acme\model\ProductTafelModel;
use Acme\model\TafelModel;
use DateTime;

class Rekening
{

    public function setPaid($idTafel): void
    {
        //TODO: de rekening voor een bepaalde tafel op betaald zetten
    }

    /**
     * @param $idTafel
     *
     * @return array
     */
    public function getBill($idTafel): array
    {
        $bill = [];
        $bm = new ProductTafelModel();
        $bestelling = $bm->getBestelling($idTafel);

        $tm = new TafelModel();

        $bill['tafel'] = $tm->getTafel($idTafel);
        $bill['datumtijd'] = [
            'timestamp' => $bestelling['datumtijd'],
            'formatted' => date(
                'dd-mm-yyyy',
                $bestelling['datumtijd']
            )
        ];
        if (isset($bestelling['products'])) {
            foreach ($bestelling['products'] as $idProduct) {
                if(!isset($bill['products'][$idProduct]['data'])) {
                    $bill['products'][$idProduct]['data'] = (new ProductModel(
                    ))->getProduct(
                        $idProduct
                    );
                }
                if (!isset($bill['products'][$idProduct]['aantal'])) $bill['products'][$idProduct]['aantal'] = 0;
                $bill['products'][$idProduct]['aantal']++;

                //TODO: bestelling op betaald zetten
                $mysqli = new mysqli("localhost", "root", "root", "kassasysteem", "3306");
                $qry = "UPDATE betaald FROM product_tafel WHERE idtafel=? VALUES (?)";
                $mysqli_stmt = $mysqli->prepare($qry);
                $mysqli_stmt->bind_param('ii', $idTafel, "1");
                $mysqli_stmt->execute();
                $result = $mysqli_stmt->get_result();
            }
        }


        return $bill;
    }

}