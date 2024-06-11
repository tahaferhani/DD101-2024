<?php
// L'héritage permet à une classe de dériver d'une autre classe, héritant ainsi de ses propriétés et méthodes.


// Classe Personne : Contient les propriétés nom et age ainsi qu'une méthode sePresenter pour présenter la personne
class Personne {
    private $nom;
    private $age;

    public function __construct($nom, $age) {
        $this->nom = $nom;
        $this->age = $age;
    }

    public function sePresenter() {
        echo "Bonjour, je m'appelle " . $this->nom;
    }
}




// Classe Employe : Hérite de Personne. Ajoute une propriété salaire et une méthode afficherSalaire
class Employe extends Personne {
    private $salaire;

    public function __construct($nom, $age, $salaire) {
        parent::__construct($nom, $age);
        $this->salaire = $salaire;
    }

    public function afficherSalaire() {
        echo "Mon salaire est de " . $this->salaire . " DH";
    }
}

$employe = new Employe("Said", 26, 8000);
$employe->sePresenter();  // Affiche "Bonjour, je m'appelle Said"
echo "<br>";
$employe->afficherSalaire();  // Affiche "Mon salaire est de 8000 DH."
echo "<br>";




// Classe Chef : Hérite de Employe. Ajoute une propriété equipe et une méthode afficherEquipe
class Chef extends Employe {
    private $equipe;

    public function __construct($nom, $age, $salaire, $equipe) {
        parent::__construct($nom, $age, $salaire);
        $this->equipe = $equipe;
    }

    public function afficherEquipe() {
        echo "Je suis chef de l'équipe " . $this->equipe;
    }
}

$chef = new Chef("Imane", 35, 11000, "Développement");
$chef->sePresenter();  // Affiche "Bonjour, je m'appelle Imane"
echo "<br>";
$chef->afficherSalaire();  // Affiche "Mon salaire est de 11000 DH."
echo "<br>";
$chef->afficherEquipe();  // Affiche "Je suis chef de l'équipe Développement"