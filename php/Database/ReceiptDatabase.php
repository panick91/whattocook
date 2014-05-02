<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 29.04.14
 * Time: 17:24
 */


include 'Database.php';
include 'Model\Receipt.php';

class ReceiptDatabase
{

    private $db;

    function __construct()
    {

        try {
            $this->db = Database::createDatabaseConnection();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getAllReceipts()
    {
        try {
            /*** The SQL SELECT statement ***/
            $sql = "SELECT * FROM receipts";

            /*** fetch into an PDOStatement object ***/
            $stmt = $this->db->query($sql);

            /*** fetch into the Ingredient class ***/
            return $stmt->fetchALL(PDO::FETCH_CLASS, 'Receipt');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getReceiptsByIngredients($ingredients)
    {

        $subSelect = $this->createIngredientSelect($ingredients);

        /*
         * CREATE TEMPORARY TABLE IF NOT EXISTS temp_receipts AS
            (
            SELECT r.*, COUNT(r2i.ingredientId) AS numberOfIngredients
            FROM receipts r
                INNER JOIN receipts2ingredients r2i ON r2i.receiptId = r.receiptId
            GROUP BY r.receiptId, r.name
            );

            SELECT r.*, COUNT(r2i.ingredientId) AS numberOfIngredients
            FROM receipts r
                INNER JOIN receipts2ingredients r2i ON r2i.receiptId = r.receiptId
                INNER JOIN (SELECT 1 AS ingredientId UNION ALL SELECT 2 UNION ALL SELECT 3) AS i ON r2i.ingredientId = i.ingredientId
            GROUP BY r.receiptId, r.name
         *
         * */

        try {
            if ($subSelect !== "") {
                $stmt = $this->db->prepare("SELECT r.*, COUNT(r2i.ingredientId) AS numberOfIngredients
                            FROM receipts r
                                INNER JOIN receipts2ingredients r2i ON r2i.receiptId = r.receiptId
                                INNER JOIN (" . $subSelect . ") AS i ON r2i.ingredientId = i.ingredientId
                            GROUP BY r.receiptId, r.name");
            } else {
                $stmt = $this->db->prepare("SELECT r.*, COUNT(r2i.ingredientId) AS numberOfIngredients
                            FROM receipts r
                                INNER JOIN receipts2ingredients r2i ON r2i.receiptId = r.receiptId
                            GROUP BY r.receiptId, r.name");
            }

            $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_BOTH);
                //return $stmt->fetchALL(PDO::FETCH_CLASS, 'Receipt');

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    private function createIngredientSelect($ingredients)
    {
        $subSelectString = "";

        if (count($ingredients) > 0) {
            $subSelectString = $subSelectString . "SELECT " . $ingredients[0] . " AS ingredientId";
            unset($ingredients[0]);
        }
        if (count($ingredients) > 0) {
            foreach ($ingredients as $ingredient) {
                $subSelectString = $subSelectString . " UNION ALL SELECT " . $ingredient;
            }
        }

        return $subSelectString;
    }

    function getReceiptsArray()
    {
        return array(
            "receipts" => $this->getAllReceipts());

    }

} 