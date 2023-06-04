<?php
// Trait permettant de gérer les utilisateurs
trait UsersTrait
{
    // getUsers() : Permets de récupérer tous les utilisateurs  
    public function getUsers()
    {
        $query = "SELECT * FROM users";

        try {
            $stmt = $this->getConnection()->prepare($query);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $e) {
            ApiResponse::sendResponse(500, 'Error getting users');
        }
    }

    // getUserById($userId) : Permets de récupérer un utilisateur par son ID
    public function getUserById($userId)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        ;
        try {
            $stmt = $this->getConnection()->prepare($query);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            ApiResponse::sendResponse(500, 'Error getting user');
        }
    }

    // saveUser($data) : Permets d'enregistrer un utilisateur
    public function addUser($data)
    {
        // Validation et sanitization des données
        $data['name'] = htmlspecialchars($data['name']);
        $data['email'] = htmlspecialchars($data['email']);
        $data['description'] = htmlspecialchars($data['description']);

        // Insertion des données dans la base de données
        $query = "INSERT INTO users (name, email, description) VALUES (:name, :email, :description)";

        try {
            $stmt = $this->getConnection()->prepare($query);
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':description', $data['description']);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            ApiResponse::sendResponse(500, 'Error adding user');
        }
    }

    // updateUser($userId, $data) : Permets de mettre à jour un utilisateur par son ID
    public function updateUser($userId, $data)
    {
        // Validation et sanitization des données
        $data['name'] = htmlspecialchars($data['name']);
        $data['email'] = htmlspecialchars($data['email']);
        $data['description'] = htmlspecialchars($data['description']);

        // Mise à jour des données dans la base de données
        $query = "UPDATE users SET name = :name, email = :email, description = :description WHERE id = :id";

        try {
            $stmt = $this->getConnection()->prepare($query);
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':id', $userId);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            ApiResponse::sendResponse(500, 'Error updating user');
        }
    }

    // removeUser($userId) : Permets de supprimer un utilisateur par son ID
    public function removeUser($userId)
    {
        $query = "DELETE FROM users WHERE id = :id";

        try {
            $stmt = $this->getConnection()->prepare($query);
            $stmt->bindParam(':id', $userId);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            ApiResponse::sendResponse(500, 'Error removing user');
        }
    }
}
?>