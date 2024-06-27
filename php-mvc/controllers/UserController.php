<?php

// Inclusion du fichier du modèle User.
require_once 'models/User.php';

// Classe UserController pour gérer les actions liées aux utilisateurs.
class UserController {

    // Méthode statique pour lister tous les utilisateurs.
    public static function listUsers() {
        $user = new User();
        $data = $user->getAllUsers();
        include 'views/user-list.php';
    }

    // Méthode statique pour afficher les détails d'un utilisateur spécifique.
    public static function userDetail($id) {
        $user = new User();
        $data = $user->getUserById($id);
        include 'views/user.php';
    }

    // Méthode statique pour créer un nouvel utilisateur.
    public static function createUser() {
        // Vérifie si la méthode de la requête est POST (Submission du formulaire).
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User();
            $user->createUser($_POST);
            // Redirection vers la page liste des utilisateurs après la création de l'utilisateur.
            header("Location: index.php");
        } else {
            // Inclusion de la vue pour afficher le formulaire de création d'utilisateur.
            include 'views/user-create.php';
        }
    }
}
?>
