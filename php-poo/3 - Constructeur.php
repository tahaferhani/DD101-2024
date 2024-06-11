<?php
// Le constructeur est une méthode spéciale appelée automatiquement lors de la création d'un objet. En PHP, il est défini avec le nom __construct

// Définition de classe
class Personne {
    private $nom;
    private $age;

    // Le constructeur
    public function __construct($nom, $age) {
        $this->nom = $nom;
        $this->age = $age;
    }

    // Le destructeur
    public function __destruct() {
        echo "L'objet Personne est détruit.";
        // Le destructeur sera appelé à la fin du script ou lors de la destruction explicite de l'objet (l'utilisation de unset($personne))
    }

    public function sePresenter() {
        echo "Bonjour, je m'appelle " . $this->nom;
    }
}


// Utilisation de la classe
$personne = new Personne("Kamal", 30);
$personne->sePresenter();  // Affiche "Bonjour, je m'appelle Kamal"
echo "<br>";