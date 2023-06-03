<?php
require_once 'helpers/ApiResponse.php'; // Classe permettant de gérer les réponses de l'API
require_once 'config/config.php'; // Fichier de configuration

// Traits
// INCLUEZ VOS TRAITS ICI
require_once 'traits/UsersTrait.php'; // Trait permettant de gérer la base de données

// Classe permettant de gérer la base de données
class Database
{
    // Traits
    // UTILISEZ VOS TRAITS ICI
    use UsersTrait;

    // Propriétés
    private static $instance;
    private $connection;

    // Constructeur
    public function __construct()
    {
        try {
            $this->connection = new PDO('sqlite:' . DB_PATH);
        } catch (PDOException $e) {
            ApiResponse::sendResponse(500);
        }
    }

    // Méthode pour obtenir l'instance de la classe
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Méthode pour obtenir la connexion à la base de données
    public function getConnection()
    {
        return $this->connection;
    }
}

?>