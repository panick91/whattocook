<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 01.04.14
 * Time: 18:09
 */

    $result = array(
        "ingredients" =>   array(
            0 => array(
                "name" => "leek",
                "source" => "lauch"
            ),
            1 => array(
                "name" => "tomato",
                "source" => "tomate"
            )
        )
    );

    $ingredientsDB = new \whattocook\IngredientDatabase();

    //$ingredientsDB.getIngredients();

    $json = json_encode($result);
    header('Content-type: application/json');
    echo $json;
?>