<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 06.05.14
 * Time: 10:35
 */

$receiptId = null;
if (array_key_exists('receiptId', $_GET)) {
    $receiptId = $_GET["receiptId"];
}

if($receiptId !== NULL){
    include '/views/receipt/receiptPage.php';
}
else{
    include '/views/search/search.php';
}
