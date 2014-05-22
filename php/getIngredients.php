<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 01.04.14
 * Time: 18:09
 */

require_once 'Database\IngredientDatabase.php';

$ingredientsDB = new IngredientDatabase();

$yourIngredients = null;
$searchText = null;
if (array_key_exists('ingredients', $_POST)) {
    $yourIngredients = $_POST['ingredients'];
}

if(array_key_exists('searchText', $_POST)){
    $searchText = $_POST['searchText'];
}

if ($searchText === NULL) {
    $searchText = "";
}

if (is_string($searchText)) {
    /*** get ingredients ***/
    if($searchText == ""){
        $result = $ingredientsDB->getAllIngredients();
    }
    else{
        $result = $ingredientsDB->getSpecificIngredients($searchText);
    }

    /*** push into necessary array structure ***/
    $result = $ingredientsDB->getIngredientsArray($result);

    /*** filter ingredients (remove already chosen ingredients) ***/
    $result = filterIngredients($yourIngredients, $result);

    /*** create JSON and return to caller ***/
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