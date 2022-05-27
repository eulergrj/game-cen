<?php

define('DB_HOST'        , "localhost");
define('DB_USER'        , "root");
define('DB_PASSWORD'    , "root");
define('DB_NAME'        , "cen_game");
define('DB_DRIVER'      , "mysql");
define('ROOT'      , "/");


class Connect{
    private static $connection;

    private function __construct(){}

    public static function getConnection() {

        $pdoConfig  = DB_DRIVER . ":". "host=" . DB_HOST . ";";
        $pdoConfig .= "dbname=".DB_NAME.";";

        try {
            if(!isset($connection)){
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD, array(
                  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ));
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
         } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\n Erro: " . $e->getMessage();
            throw new Exception($mensagem);
         }
     }
}

$Conection = Connect::getConnection();




 ?>