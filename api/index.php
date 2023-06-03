<?php
require_once 'helpers/ApiResponse.php'; // Gestion des réponses
require_once 'config/config.php'; // Fichier de configuration

// On stock les requêtes dans un fichier log
require_once 'helpers/logs.php';

// Récupération des informations de la requête
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

// Suppression du préfixe de l'API de l'URI
$requestUri = str_replace(API_PREFIX, '', $requestUri);

// Inclusion des endpoints
// METTRE À JOUR CETTE LISTE À CHAQUE NOUVEL ENDPOINT
require_once 'endpoints/ping.php';
require_once 'endpoints/users.php';

// Endpoint par défaut si l'URI ne correspond à aucun endpoint
if (!defined('API_ENDPOINT_MATCHED')) {
    ApiResponse::sendResponse(404, 'Endpoint not found');
}