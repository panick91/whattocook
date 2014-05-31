<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 06.05.14
 * Time: 10:35
 */

$server_path = $_SERVER['DOCUMENT_ROOT'];

$intend = null;
if (array_key_exists('intend', $_GET)) {
    $intend = $_GET["intend"];
}

$receiptId = null;
if (array_key_exists('receiptId', $_GET)) {
    $receiptId = $_GET["receiptId"];
}

if($intend === "receipt" && $receiptId !== NULL)
    include $server_path.'/views/receipt/receiptPage.php';
else if ($intend === "addReceipt"){
    include $server_path.'/views/receipt/addReceipt.php';
}
else{
    include $server_path.'/views/search/search.php';
}

