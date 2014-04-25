<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 01.04.14
 * Time: 18:09
 */

    include 'Database\IngredientDatabase.php';

    $ingredientsDB = new IngredientDatabase();

    $result = $ingredientsDB->getAllIngredientsArray('');

    $json = json_encode($result);
    header('Content-type: application/json');
    echo $json;

?>