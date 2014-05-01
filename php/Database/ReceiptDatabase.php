<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 29.04.14
 * Time: 17:24
 */


include 'Database.php';
include 'Model\Receipt.php';

class ReceiptDatabase {

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

    function getAllReceipts(){
        try{
            /*** The SQL SELECT statement ***/
            $sql = "SELECT * FROM receipts";

            /*** fetch into an PDOStatement object ***/
            $stmt = $this->db->query($sql);

            /*** fetch into the Ingredient class ***/
            return $stmt->fetchALL(PDO::FETCH_CLASS, 'Receipt');
        }
        catch(PDOException $e)
        {
            //echo $e->getMessage();
        }
    }

    function getReceiptsArray(){
        return array(
            "receipts" => $this->getAllReceipts());

    }

} 