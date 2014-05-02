<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 21.04.14
 * Time: 20:39
 */

include 'Database.php';
include 'Model\Ingredient.php';

class IngredientDatabase {



    private $db;

    function __construct() {

        try{
            $this->db = Database::createDatabaseConnection();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function getAllIngredients(){
        try{
            /*** The SQL SELECT statement ***/
            $sql = "SELECT * FROM ingredients LIMIT 4";

            /*** fetch into an PDOStatement object ***/
            $stmt = $this->db->query($sql);

            /*** fetch into the Ingredient class ***/
            return $stmt->fetchALL(PDO::FETCH_CLASS, 'Ingredient');
        }
        catch(PDOException $e)
        {
            //echo $e->getMessage();
        }
    }

    function getSpecificIngredients($searchString){
        try{
            /*** The SQL SELECT statement ***/
            $sql = "SELECT * FROM ingredients i WHERE i.label LIKE concat('%','" . $searchString . "','%') ORDER BY i.label";

            /*** fetch into an PDOStatement object ***/
            $stmt = $this->db->query($sql);

            /*** fetch into the Ingredient class ***/
            return $stmt->fetchALL(PDO::FETCH_CLASS, 'Ingredient');
        }
        catch(PDOException $e)
        {
            //echo $e->getMessage();
        }
    }

    function getAllIngredientsArray($searchString){
        if($searchString == ""){
            return array(
                "ingredients" => $this->getAllIngredients());
        }
        else{
            return array(
                "ingredients" => $this->getSpecificIngredients($searchString));
        }

    }
} 