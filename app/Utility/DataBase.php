<?php

class DataBase
{    
    // Propriétés de la classe pour la connexion à la base de données
    private $dsn; // Variable de stockage des données de connexion PDO
    private static $_instance; // Stocke l'instance unique de la classe

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct()
    {        
        // Récupération des informations de configuration depuis un fichier ini
        $configData = parse_ini_file('config.ini');        
        
        try {
            // Connexion à la base de données en utilisant PDO avec les informations de configuration
            $this->dsn = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],                
            );
        } catch (PDOException $exception) {            
            // En cas d'échec de la connexion, affichage de l'erreur et arrêt du script
            echo $exception->getMessage() . '<br>';                                    
            die;
        }
    }    

    // Méthode statique pour récupérer l'instance de connexion PDO
    public static function connectPDO()
    {        
        // Vérification si une instance existe déjà, sinon en crée une nouvelle
        if (empty(self::$_instance)) {
            self::$_instance = new DataBase();
        }
        // Retourne l'objet PDO pour la connexion à la base de données
        return self::$_instance->dsn;
    }
}
