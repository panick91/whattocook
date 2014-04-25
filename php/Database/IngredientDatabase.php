<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 21.04.14
 * Time: 20:39
 */

include 'Model\Ingredient.php';

class IngredientDatabase {

    private $hostname = "localhost";
    private $username = "whattocookUser";
    private $databaseName = "whattocook";
    private $password = "wtc";

    private $db;

    function __construct() {

        try{
            $this->db = new PDO("mysql:host=$this->hostname;dbname=$this->databaseName", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch(PDOException $e)
        {
            //echo $e->getMessage();
        }
    }

    function getAllIngredients(){
        try{
            /*** The SQL SELECT statement ***/
            $sql = "SELECT * FROM ingredients";

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
            $sql = "SELECT * FROM ingredients i WHERE i.label LIKE concat('%','" . $searchString . "','%')";

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