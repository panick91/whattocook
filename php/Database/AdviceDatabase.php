<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 21.04.14
 * Time: 20:39
 */

require_once $_SERVER['DOCUMENT_ROOT'].'\php\Database\Database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'\php\Model\Advice.php';

class AdviceDatabase {



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

    function getAllAdvices(){
        try{
            /*** The SQL SELECT statement ***/
            $stmt = $this->db->prepare("SELECT *
                                        FROM importantadvices");

            /*** execution ***/
            if($stmt->execute()){
                /*** fetch into class Ingredient ***/
                return $stmt->fetchALL(PDO::FETCH_CLASS, 'Advice');
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function getAdvicesByReceiptId($receiptId){
        try{

            /*** prepare statement ***/
            $stmt = $this->db->prepare("SELECT ia.*
                                        FROM importantadvices ia
                                          INNER JOIN receipts2advices r2a ON ia.adviceId = r2a.adviceId
                                        WHERE r2a.receiptId = ?
                                        ORDER BY ia.advice");

            /*** execution ***/
            if($stmt->execute(array($receiptId))){
                /*** fetch into class Ingredient ***/
                return $stmt->fetchALL(PDO::FETCH_CLASS, 'Advice');
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function getAdvicesArray($ingredientsArray){

            return array(
                "advices" => $ingredientsArray
            );

    }
} 