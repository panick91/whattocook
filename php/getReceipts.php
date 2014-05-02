<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 20.04.14
 * Time: 21:40
 */

    include 'Database\ReceiptDatabase.php';

    $ingredientsDB = new ReceiptDatabase();

    $result = $ingredientsDB->getReceiptsArray();

    $ingredientsDB->getReceiptsByIngredients(array(1,2,3));

    $json = json_encode($result);
    header('Content-type: application/json');
    echo $json;


?>