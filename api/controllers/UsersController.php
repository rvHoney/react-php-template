<?php
require_once 'models/User.php'; // Inclusion du modèle User
require_once 'helpers/ApiResponse.php'; // Classe permettant de gérer les réponses de l'API
require_once 'models/Database.php'; // On importe la classe Database

class UserController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // Méthode obtenir tous les utilisateurs
    public function getUsers()
    {
        $users = $this->db->getUsers();
        ApiResponse::sendResponse(200, $users);
    }

    // Méthode pour obtenir un utilisateur par son ID
    public function getUserById($userId)
    {
        $user = $this->db->getUserById($userId);
        if ($user) {
            ApiResponse::sendResponse(200, $user);
        } else {
            ApiResponse::sendResponse(404, 'User not found');
        }
    }

    // Méthode pour enregistrer un utilisateur
    public function addUser($data)
    {
        $result = $this->db->addUser($data);
        if ($result) {
            ApiResponse::sendResponse(200);
        } else {
            ApiResponse::sendResponse(500, 'Error adding user');
        }
    }

    // Méthode pour mettre à jour un utilisateur par son ID
    public function updateUser($userId, $data)
    {
        $result = $this->db->updateUser($userId, $data);
        if ($result) {
            ApiResponse::sendResponse(200);
        } else {
            ApiResponse::sendResponse(500, 'Error updating user');
        }
    }

    // Méthode pour supprimer un utilisateur par son ID
    public function removeUser($userId)
    {
        $result = $this->db->removeUser($userId);
        if ($result) {
            ApiResponse::sendResponse(200);
        } else {
            ApiResponse::sendResponse(500, 'Error removing user');
        }
    }
}