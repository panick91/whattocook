<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 20.05.14
 * Time: 17:15
 */


require_once 'Database\RatingDatabase.php';

$ratingDB = new RatingDatabase();


$receiptId = null;
$rating = null;

if (array_key_exists('receiptId', $_POST)) {
    $receiptId = $_POST['receiptId'];
}

if(array_key_exists('rating', $_POST)){
    $rating = $_POST['rating'];
}

$newRating = $ratingDB->saveRating($rating,$receiptId);

echo $newRating->AVG_rating;