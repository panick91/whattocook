<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 21.04.14
 * Time: 20:39
 */

require_once 'Database.php';
require_once 'Model\Ingredient.php';

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
            $stmt = $this->db->prepare("SELECT *
                                        FROM ingredients
                                        LIMIT 4");

            /*** execution ***/
            if($stmt->execute(array())){
                /*** fetch into class Ingredient ***/
                return $stmt->fetchALL(PDO::FETCH_CLASS, 'Ingredient');
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function getSpecificIngredients($searchString){
        try{

            /*** prepare statement ***/
            $stmt = $this->db->prepare("SELECT *
                                        FROM ingredients i
                                        WHERE i.label
                                        LIKE ?
                                        ORDER BY i.label
                                        LIMIT 4");

            /*** execution ***/
            if($stmt->execute(array('%'.$searchString.'%'))){
                /*** fetch into class Ingredient ***/
                return $stmt->fetchALL(PDO::FETCH_CLASS, 'Ingredient');
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function getIngredientsArray($ingredientsArray){

            return array(
                "ingredients" => $ingredientsArray
            );

    }
} 