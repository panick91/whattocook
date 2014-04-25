<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 01.04.14
 * Time: 18:09
 */

    include 'Database\IngredientDatabase.php';

    $ingredientsDB = new IngredientDatabase();

    $searchText = $_POST['searchText'];

    if(is_string($searchText)){
        $result = $ingredientsDB->getAllIngredientsArray($searchText);

        $json = json_encode($result);
        header('Content-type: application/json');
        echo $json;
    }
?>