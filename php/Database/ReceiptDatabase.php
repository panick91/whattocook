<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 29.04.14
 * Time: 17:24
 */


require_once $_SERVER['DOCUMENT_ROOT'] . '\php\Database\Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\php\Model\Receipt.php';

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

    function saveReceipt($receipt)
    {
        try {
            /*** The SQL SELECT statement ***/
            $stmt = $this->db->prepare("INSERT INTO receipts (name,instructions,difficulty,imagePartName,duration)
                                        SELECT ?,?,?,?,?");

            $receiptName = $receipt->getName();
            $receiptInstructions = $receipt->getInstructions();
            $receiptDifficulty = $receipt->getDifficulty();
            $receiptImage = $receipt->getImagePartName();
            $receiptDuration = $receipt->getDurration();

            if($receiptImage === ''){
                $receiptImage = 'Placeholder';
            }

            $stmt->bindParam(1, $receiptName, PDO::PARAM_STR);
            $stmt->bindParam(2, $receiptInstructions, PDO::PARAM_STR);
            $stmt->bindParam(3, $receiptDifficulty, PDO::PARAM_STR);
            $stmt->bindParam(4, $receiptImage, PDO::PARAM_STR);
            $stmt->bindParam(5, $receiptDuration, PDO::PARAM_STR);

            /*** execution ***/
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getReceiptsById($id)
    {
        try {
            /*** The SQL SELECT statement ***/
            $stmt = $this->db->prepare("SELECT * FROM receipts r WHERE r.receiptId = ?");

            /*** execution ***/
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Receipt');
            if ($stmt->execute(array($id))) {
                /*** fetch into class Ingredient ***/
                return $stmt->fetch();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getReceiptsByIngredients($ingredients)
    {
        /*** create mysql subselect ***/
        $subSelect = $this->createIngredientSelect($ingredients);

        try {
            if ($subSelect !== "") {
                $stmt = $this->db->prepare("SELECT r.receiptId, r.name,r.instructions,r.duration,r.difficulty,r.imagePartName,IFNULL( (COUNT(r2i.ingredientId)/r2.numberOfIngredients) , 0) AS score
                                            FROM receipts r
                                                INNER JOIN receipts2ingredients r2i ON r2i.receiptId = r.receiptId
                                                INNER JOIN (" . $subSelect . ") AS i ON r2i.ingredientId = i.ingredientId
                                                INNER JOIN (SELECT r2i.receiptId, COUNT(r2i.ingredientId) AS numberOfIngredients FROM receipts2ingredients r2i GROUP BY r2i.receiptId)  AS r2 ON r2.receiptId = r.receiptId
                                            GROUP BY r.receiptId, r.name
                                            ORDER BY score DESC, r.name ASC;");
            } else {
                $stmt = $this->db->prepare("SELECT r.receiptId, r.name,r.instructions,r.duration,r.difficulty,r.imagePartName, 0 AS score
                            FROM receipts r
                            ORDER BY r.name ASC
                            LIMIT 100;");
            }

            if ($stmt->execute()) {
                return $stmt->fetchALL(PDO::FETCH_CLASS, 'Receipt');
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Creates a MySQL select statement by ingredients.
     *
     * @param $ingredients = array of ingredient ids
     * @return string = form: 'SELECT x1 UNION ALL SELECT x2 ... UNION ALL SELECT xN'
     */
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

    function getReceiptsArray($receipt)
    {
        return array(
            "receipts" => $receipt
        );

    }

} 