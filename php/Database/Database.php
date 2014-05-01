<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 29.04.14
 * Time: 17:06
 */

class Database {

    private static $hostname = "localhost";
    private static $username = "whattocookUser";
    private static $databaseName = "whattocook";
    private static $password = "wtc";


    public static function createDatabaseConnection() {
        $db = null;

        try{
            $db = new PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$databaseName, self::$username, self::$password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return $db;
    }
} 