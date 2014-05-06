<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 06.05.14
 * Time: 10:35
 */

$intent = null;
if (array_key_exists('intent', $_GET)) {
    $intent = $_GET["intent"];
}

if($intent === NULL){
    include 'search/search.php';
}
