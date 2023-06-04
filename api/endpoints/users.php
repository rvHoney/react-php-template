<?php
// Instanciation du contrôleur UserController
$userController = new UserController();

// GET /users
// Endpoint pour obtenir tous les utilisateurs
new Endpoint('GET', '/users', function () use ($userController) {
    $userController->getUsers();
});

// GET /user/{id}
// Endpoint pour obtenir un utilisateur par son ID
new Endpoint('GET', '/user/{int}', function ($matches) use ($userController) {
    $userId = $matches;
    $userController->getUserById($userId);
});

// POST /user
// Endpoint pour enregistrer un utilisateur
new Endpoint('POST', '/user', function () use ($userController) {
    $data = json_decode(file_get_contents('php://input'), true);
    $userController->addUser($data);
});

// PUT /user/{id}
// Endpoint pour mettre à jour un utilisateur par son ID
new Endpoint('PUT', '/user/{int}', function ($matches) use ($userController) {
    $userId = $matches;
    $data = json_decode(file_get_contents('php://input'), true);
    $userController->updateUser($userId, $data);
});

// DELETE /user/{id}
// Endpoint pour supprimer un utilisateur par son ID
new Endpoint('DELETE', '/user/{int}', function ($matches) use ($userController) {
    $userId = $matches;
    $userController->removeUser($userId);
});
?>