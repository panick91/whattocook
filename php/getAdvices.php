<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 01.04.14
 * Time: 18:09
 */

require_once $_SERVER['DOCUMENT_ROOT'].'\php\Database\AdviceDatabase.php';

$adviceDB = new AdviceDatabase();

$receiptId = null;
if (array_key_exists('receiptId', $_POST)) {
    $yourIngredients = $_POST['receiptId'];
}

if ($receiptId !== NULL) {
    /*** get advices ***/
    $result = $adviceDB->getAdvicesByReceiptId($receiptId);

    /*** push into necessary array structure ***/
    $result = $adviceDB->getAdvicesArray($result);

    /*** create JSON and return to caller ***/
    $json = json_encode($result);
    header('Content-type: application/json');
    echo $json;
}
?>