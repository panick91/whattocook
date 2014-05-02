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

$yourIngredients = null;
if (array_key_exists('ingredients', $_POST)) {
    $yourIngredients = $_POST['ingredients'];
}

if ($searchText === NULL) {
    $searchText = "";
}

if (is_string($searchText)) {
    $result = $ingredientsDB->getAllIngredientsArray($searchText);

    $result = filterIngredients($yourIngredients, $result);

    $json = json_encode($result);
    header('Content-type: application/json');
    echo $json;
}

function filterIngredients($yourIngredients, $searchResults)
{
    //$yourIngredients = [1,2,3];

    if ($yourIngredients != null) {
        for ($index = 0; $index < count($searchResults['ingredients']); $index++) {

            if ((array_search($searchResults['ingredients'][$index]->getIngredientId(), $yourIngredients)) !== false) {
                unset($searchResults['ingredients'][$index]);
            }
        }
    }
    $searchResults['ingredients'] = array_values($searchResults['ingredients']);

    return $searchResults;
}

?>