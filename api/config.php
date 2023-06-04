<?php
// Requêtes CROSS-ORIGIN ----------------------------------------------------------------------
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Content-Type: application/json; charset=utf-8');
// --------------------------------------------------------------------------------------------



// Configuration de l'API ---------------------------------------------------------------------
define('API_PREFIX', '/api'); // Préfixe de l'API
// --------------------------------------------------------------------------------------------



// Fichier de configuration pour la base de données (SQLite3) ---------------------------------
define('DB_PATH', 'data/database.db'); // Chemin vers la base de données
// --------------------------------------------------------------------------------------------



// Imports obligatoires -----------------------------------------------------------------------
require_once 'utils/ApiResponse.php'; // Classe pour gérer les réponses de l'API
require_once 'utils/Endpoint.php'; // Classe pour gérer les endpoints de l'API
require_once 'utils/logs.php'; // Fonctions pour gérer les logs de l'API
require_once 'models/Database.php'; // Classe pour gérer la base de données
// --------------------------------------------------------------------------------------------



// Imports des traits -------------------------------------------------------------------------
// POUR UTILISER VOS TRAITS IL FAUT LES IMPORTER DANS LA CLASSE Database (models/Database.php)
// --------------------------------------------------------------------------------------------



// Imports des contrôleurs --------------------------------------------------------------------
// IMPORTEZ VOS CONTRÔLEURS D'ENDPOINTS ICI
require_once 'controllers/PingEndpointController.php';
require_once 'controllers/UsersEndpointController.php';
// IMPORTEZ VOS AUTRES CONTRÔLEURS ICI
// require_once 'controllers/...';
// --------------------------------------------------------------------------------------------



// Import des modèles -------------------------------------------------------------------------
// IMPORTEZ VOS MODÈLES ICI
// --------------------------------------------------------------------------------------------
?>