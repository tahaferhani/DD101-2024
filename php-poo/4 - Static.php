<?php

class Personne {
    private static $nombrePersonnes = 0;

    public function __construct() {
        // Incrémente le nombre de personne à chaque nouvelle instance créée
        self::$nombrePersonnes++;
    }

    public function __destruct()
    {
        // Décremente le nombre de personne
        self::$nombrePersonnes--;
    }

    public static function getNombrePersonnes() {
        // Retourne le nombre d'instances créées jusqu'à présent
        return self::$nombrePersonnes;
    }
}

// Création de plusieurs instances de la classe Compteur
$perso1 = new Personne();
$perso2 = new Personne();
$perso3 = new Personne();

// Affichage du nombre d'instances créées
echo "Nombre de personnes : " . Personne::getNombrePersonnes(); // Affiche 3
echo "<br>";

unset($perso1);

echo "Nombre de personnes : " . Personne::getNombrePersonnes(); // Affiche 2