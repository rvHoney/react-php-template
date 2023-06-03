<?php
require_once 'controllers/UsersController.php';
require_once 'helpers/ApiResponse.php';

require_once 'config/config.php'; // Fichier de configuration

// Récupération des informations de la requête
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

// Suppression du préfixe de l'API de l'URI
$requestUri = str_replace(API_PREFIX, '', $requestUri);

// Instanciation du contrôleur UserController
$userController = new UserController();

// GET /users
// Endpoint pour obtenir tous les utilisateurs
if ($requestUri === '/users' && $requestMethod === 'GET')
{
    $userController->getUsers();
}

// GET /user/1
// Endpoint pour obtenir un utilisateur par son ID
elseif (preg_match('/^\/user\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'GET')
{
    $userId = $matches[1];
    $userController->getUserById($userId);
}

// POST /user
// Endpoint pour enregistrer un utilisateur
elseif ($requestUri === '/user' && $requestMethod === 'POST')
{
    $data = json_decode(file_get_contents('php://input'), true);
    $userController->addUser($data);
}

// PUT /user/{id}
// Endpoint pour mettre à jour un utilisateur par son ID
elseif (preg_match('/^\/user\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'PUT')
{
    $userId = $matches[1];
    $data = json_decode(file_get_contents('php://input'), true);
    $userController->updateUser($userId, $data);
}

// DELETE /user/{id}
// Endpoint pour supprimer un utilisateur par son ID
elseif (preg_match('/^\/user\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'DELETE')
{
    $userId = $matches[1];
    $userController->removeUser($userId);
}

elseif ($requestMethod === 'OPTIONS') {
    ApiResponse::sendResponse(200);
}
?>