<?php

/*
    !Introduction à MVC
    Le modèle MVC se décompose en trois parties :

    * Modèle (Model) :
    Il interagit avec la base de données et traite les données.
    * Vue (View) :
    Affiche les données fournies par le modèle de manière appropriée. Elle est responsable de la présentation des données à l'utilisateur.
    * Contrôleur (Controller) :
    Interagit avec l'utilisateur, traite les requêtes entrantes, appelle les modèles pour obtenir des données et renvoie les vues appropriées.
 */

 // Inclusion du fichier du contrôleur UserController.
require 'controllers/UserController.php';

// Récupération de l'action à partir des paramètres GET.
$action = @$_GET['action'];

// Structure de contrôle pour diriger les actions en fonction de la valeur de l'action.
switch ($action) {
    // Si l'action est 'detail', affiche les détails d'un utilisateur spécifique.
    case 'detail':
        $id = @$_GET['id'];
        UserController::userDetail($id);
        break;

    // Si l'action est 'create', affiche le formulaire de création d'un nouvel utilisateur ou traite la création d'un nouvel utilisateur.
    case 'create':
        UserController::createUser();
        break;

    // Action par défaut, liste tous les utilisateurs.
    default:
        UserController::listUsers();
        break;
}
?>