<?php
require_once 'config.php';

LogRequest::SaveLog(); // Sauvegarde la requête dans les logs

// Inclusion des endpoints
// METTRE À JOUR CETTE LISTE À CHAQUE NOUVEL ENDPOINT
require_once 'endpoints/ping.php';
require_once 'endpoints/users.php';

// OPTIONS (Permet d'accepter les requêtes OPTIONS pour les CORS)
new Endpoint('OPTIONS', '/{any}', function () {
    ApiResponse::sendResponse(200);
});

// Endpoint par défaut si l'URI ne correspond à aucun endpoint
if (!defined('API_ENDPOINT_MATCHED')) {
    ApiResponse::sendResponse(404, 'Endpoint not found');
}