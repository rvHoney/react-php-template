<?php
require_once 'config/config.php';
require_once 'helpers/ApiResponse.php';

// GET /ping
// Endpoint pour vérifier le fonctionnement de l'API
if ($requestUri === '/ping' && $requestMethod === 'GET')
{
    ApiResponse::sendResponse(200, 'pong');
}
?>