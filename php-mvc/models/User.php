<?php

// Inclusion du fichier de base de la classe Model.
require_once 'Model.php';

// Classe User héritant de la classe Model pour gérer les opérations liées aux utilisateurs.
class User extends Model {

    // Méthode pour récupérer tous les utilisateurs de la base de données.
    public function getAllUsers() {
        $query = $this->getDb()->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Méthode pour récupérer un utilisateur par son identifiant.
    public function getUserById($id) {
        $query = $this->getDb()->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Méthode pour créer un nouvel utilisateur dans la base de données.
    public function createUser($data) {
        $query = $this->getDb()->prepare("INSERT INTO users (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)");
        return $query->execute([
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['username'],
            $data['password']
        ]);
    }
}
?>
