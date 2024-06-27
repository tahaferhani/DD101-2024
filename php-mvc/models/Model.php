<?php

// Classe de base pour les modèles, gérant la connexion à la base de données.
class Model {
    // Variable statique pour stocker l'instance PDO de la base de données.
    protected static $db;

    // Constructeur de la classe Model.
    public function __construct() {
        // Vérifie si la connexion à la base de données n'a pas encore été établie.
        if (self::$db === null) {
            try {
                // Initialise la connexion à la base de données avec PDO.
                self::$db = new PDO('mysql:host=localhost;dbname=products', 'root', '');
                // Configure PDO pour lever des exceptions en cas d'erreur.
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Affiche un message d'erreur et arrête l'exécution du script en cas d'échec de la connexion.
                echo "Connection failed: " . $e->getMessage();
                die;
            }
        }
    }

    // Méthode pour obtenir l'instance de la base de données.
    protected function getDb() {
        return self::$db;
    }
}