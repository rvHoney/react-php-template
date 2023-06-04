<?php
foreach (glob("traits/*.php") as $filename) {
    require_once $filename;
}

// Classe permettant de gérer la base de données
class Database
{
    // UTILISEZ VOS TRAITS ICI (POUR LA GESTION DE LA BASE DE DONNÉES)
    use UsersTrait;
    // FIN DES TRAITS

    private static $instance;
    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('sqlite:' . DB_PATH);
        } catch (PDOException $e) {
            ApiResponse::sendResponse(500);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
?>