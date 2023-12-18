<?php

class DataBase
{    
    private $dsn;
    private static $_instance;
    private function __construct()
    {        
     
        $configData = parse_ini_file('config.ini');        
        try {
            $this->dsn = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],                
            );
        } catch (PDOException $exception) {            
            echo $exception->getMessage() . '<br>';                                    
            die;
        }
    }    
    public static function connectPDO()
    {        
        if (empty(self::$_instance)) {
            self::$_instance = new DataBase();
        }
        return self::$_instance->dsn;
    }
}