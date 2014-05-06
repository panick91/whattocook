<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 20.04.14
 * Time: 21:40
 */

require_once 'Database\ReceiptDatabase.php';

$receiptDB = new ReceiptDatabase();

$yourIngredients = null;
if (array_key_exists('ingredients', $_POST)) {
    $yourIngredients = $_POST['ingredients'];
}

$result = $receiptDB->getReceiptsByIngredients($yourIngredients);
$result = $receiptDB->getReceiptsArray($result);


$json = json_encode($result);
header('Content-type: application/json');
echo $json;


?>