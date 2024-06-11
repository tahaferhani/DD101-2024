<?php

// Définition de classe
class Personne {
    // Propriétés
    public $nom;
    public $age;

    // Méthodes
    public function sePresenter() {
        echo "Bonjour, je m'appelle " . $this->nom;
    }
}


// Déclaration d'un objet (Créer une instance)
$personne = new Personne();
$personne->nom = "Kamal";
$personne->age = 30;

echo $personne->nom;  // Affiche "Kamal"
echo "<br>";
$personne->sePresenter();  // Affiche "Bonjour, je m'appelle Kamal"