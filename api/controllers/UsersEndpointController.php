<?php
class UserEndpointController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // Méthode obtenir tous les utilisateurs
    public function getUsers()
    {
        $data = $this->db->getUsers();
        ApiResponse::sendResponse(200, $data);
    }

    // Méthode pour obtenir un utilisateur par son ID
    public function getUserById($userId)
    {
        $data = $this->db->getUserById($userId);
        if ($data) {
            ApiResponse::sendResponse(200, $data);
        } else {
            ApiResponse::sendResponse(404, 'User not found');
        }
    }

    // Méthode pour enregistrer un utilisateur
    public function addUser($userArgs)
    {
        $data = $this->db->addUser($userArgs);
        if ($data) {
            ApiResponse::sendResponse(200);
        } else {
            ApiResponse::sendResponse(500, 'Error adding user');
        }
    }

    // Méthode pour mettre à jour un utilisateur par son ID
    public function updateUser($userId, $userArgs)
    {
        $data = $this->db->updateUser($userId, $userArgs);
        if ($data) {
            ApiResponse::sendResponse(200);
        } else {
            ApiResponse::sendResponse(500, 'Error updating user');
        }
    }

    // Méthode pour supprimer un utilisateur par son ID
    public function removeUser($userId)
    {
        $data = $this->db->removeUser($userId);
        if ($data) {
            ApiResponse::sendResponse(200);
        } else {
            ApiResponse::sendResponse(500, 'Error removing user');
        }
    }
}