<?php
/*
 L'encapsulation est un principe fondamental de la Programmation Orientée Objet (POO). Elle permet de protéger les données en limitant l'accès direct aux propriétés d'un objet. Cela signifie que vous pouvez contrôler comment ces propriétés sont lues ou modifiées. En PHP, cela se fait en utilisant des modificateurs de visibilité : public, private, et protected.

 • public : Les propriétés et méthodes déclarées comme public sont accessibles de n'importe où, aussi bien à l'intérieur qu'à l'extérieur de la classe.
 • private : Les propriétés et méthodes déclarées comme private ne sont accessibles qu'à l'intérieur de la classe qui les a définies.
 • protected : Les propriétés et méthodes déclarées comme protected sont accessibles dans la classe qui les a définies ainsi que dans les classes qui en héritent.
*/

// Définition de classe
class Personne {
    private $nom;
    private $age;

    // Getter pour 'nom'
    public function getNom() {
        return $this->nom;
    }

    // Setter pour 'nom'
    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Getter pour 'age'
    public function getAge() {
        return $this->age;
    }

    // Setter pour 'age'
    public function setAge($age) {
        if($age > 0) {
            $this->age = $age;
        } else {
            throw new Exception("L'âge doit être un nombre positif.");
        }
    }

    public function sePresenter() {
        echo "Bonjour, je m'appelle " . $this->nom;
    }
}


// Utilisation de la classe
$personne = new Personne();

// Modifier les propriétés via les méthodes setter
$personne->setNom("Kamal");
$personne->setAge(35);

// Accéder aux propriétés via les méthodes getter
echo $personne->getNom();  // Affiche "Kamal"
echo "<br>";
echo $personne->getAge();  // Affiche 35
echo "<br>";

// Essayons de définir un âge invalide
try {
    $personne->setAge(-5);
} catch (Exception $e) {
    echo $e->getMessage();  // Affiche "L'âge doit être un nombre positif."
}