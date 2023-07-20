<?php

class Database 
{
    private static $dbHost = "localhost";
    private static $dbName = "burgercode_bdd_initiale"; //"id18954897_my_bdd"; 
    private static $dbUser = "root"; // "id18954897_test";  
    private static $dbUserPassword = "root";

    private static $connection = null;

    public static function connect(){
        try
        {
            self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,self::$dbUser,self::$dbUserPassword);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());    
        }
        return self::$connection;
    }

    public static function disconnect()
    {
        self::$connection = null;
    }
    
}

?>