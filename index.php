<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 06.05.14
 * Time: 10:35
 */

$server_path = $_SERVER['DOCUMENT_ROOT'];

$receiptId = null;
if (array_key_exists('receiptId', $_GET)) {
    $receiptId = $_GET["receiptId"];
}

if($receiptId !== NULL){
    include $server_path.'/views/receipt/receiptPage.php';
}
else{
    include $server_path.'/views/search/search.php';
}
