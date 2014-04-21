<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 21.04.14
 * Time: 20:39
 */

namespace whattocook;


class IngredientDatabase {

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=whattocook;charset=utf8', 'whattocook', 'whattocook');
        //$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    function getIngredients(){
        $query = "SELECT * FROM ingredients";

        foreach($this->db->query($query) as $row) {

        }
    }
} 