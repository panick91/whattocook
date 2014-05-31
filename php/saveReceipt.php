<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 31.05.14
 * Time: 15:35
 */

require_once $_SERVER['DOCUMENT_ROOT'].'\php\Database\ReceiptDatabase.php';

if (array_key_exists('receiptName', $_POST) &&
    array_key_exists('instructions', $_POST) &&
    array_key_exists('difficulty', $_POST) &&
    array_key_exists('image', $_POST) &&
    array_key_exists('duration', $_POST)) {

    $receiptDB = new ReceiptDatabase();


    $newReceipt = new Receipt();
    $newReceipt->setName($_POST['receiptName']);
    $newReceipt->setInstructions($_POST['instructions']);
    $newReceipt->setDifficulty($_POST['difficulty']);
    $newReceipt->setImagePartName($_POST['image']);
    $newReceipt->setDuration($_POST['duration'].' Minutes');

    $receiptDB->saveReceipt($newReceipt);

}