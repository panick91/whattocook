<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 29.04.14
 * Time: 17:24
 */


require_once $_SERVER['DOCUMENT_ROOT'].'\php\Database\Database.php';

class RatingDatabase
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

    function saveRating($rating, $receiptId)
    {
        try {
            /*** prepare first statement ***/
            $stmt = $this->db->prepare('INSERT INTO ratings (rating,receiptId)
                                        VALUES(?,?);');

            /*** bind parameter ***/
            $stmt->bindParam(1,$rating,PDO::PARAM_INT);
            $stmt->bindParam(2,$receiptId,PDO::PARAM_INT);

            /*** execution ***/
            $stmt->execute();



            /*** prepare second statement ***/
            $stmt = $this->db->prepare('SELECT r.receiptId, FLOOR(AVG(r.rating)) AS AVG_rating
                                        FROM ratings r
                                        WHERE r.receiptId = ?
                                        GROUP BY r.receiptId;');

            /*** bind parameter ***/
            $stmt->bindParam(1,$receiptId,PDO::PARAM_INT);

            /*** execution ***/
            if($stmt->execute()){
                /*** fetch into class Ingredient ***/
                return $stmt->fetchObject();
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getRatingByReceiptId($receiptId){
        try {
            /*** prepare first statement ***/
            $stmt = $this->db->prepare('SELECT FLOOR(AVG(r.rating)) AS AVG_rating
                                        FROM ratings r
                                        WHERE r.receiptId = ?
                                        GROUP BY r.receiptId;');


            /*** execution ***/
            if($stmt->execute(array($receiptId))){
                /*** fetch into class Ingredient ***/
                return $stmt->fetchObject();
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
} 