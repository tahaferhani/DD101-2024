<?php

/*
 * __construct() et __destruct()
 
 La méthode __construct() est le constructeur d'une classe. Elle est automatiquement appelée lors de la création d'une nouvelle instance de la classe. C'est souvent utilisé pour initialiser les propriétés de l'objet.

 La méthode __destruct() est appelée automatiquement lorsqu'un objet est détruit. C'est souvent utilisé pour effectuer des opérations de nettoyage ou de libération des ressources.
*/

class Personne {
    public $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }
    
    public function __destruct() {
        echo "L'objet a été détruit.";
    }
}

$personne = new Personne("Kamal");
echo $personne->nom; // Affiche "Kamal"



/*
 * __set() et __get()
 
 Les méthodes __set() et __get() sont utilisées pour définir et accéder à des propriétés d'objet inaccessibles ou non définies.
*/

class Vehicule {
    private $marque;

    public function __set($propriete, $valeur) {
        $this->$propriete = $valeur;
    }

    public function __get($propriete) {
        return $this->$propriete;
    }
}

$vehicule = new Vehicule();
$vehicule->marque = "Audi";
echo $vehicule->marque; // Affiche "Audi"



/*
 * __isset() et __unset()
 
 Les méthodes __isset() et __unset() sont utilisées pour déterminer si une propriété est définie ou pour la supprimer.
*/

class Animale {
    private $type;

    public function __isset($propriete) {
        return isset($this->$propriete);
    }

    public function __unset($propriete) {
        unset($this->$propriete);
    }
}

$animale = new Animale();
echo isset($animale->type); // Affiche false
unset($animale->type); // Supprime la valeur du type



/*
 * __toString()
 
 La méthode __toString() est utilisée pour convertir un objet en une chaîne de caractères. Elle est appelée automatiquement lorsqu'un objet est utilisé dans un contexte de chaîne de caractères, tel qu'une instruction echo.
*/

class Laptop {
    private $nom;
    private $ram;

    public function __construct($nom, $ram) {
        $this->nom = $nom;
        $this->ram = $ram;
    }

    public function __toString() {
        return "Un PC " . $this->nom . ", avec " . $this->ram . "GO de RAM";
    }
}

$laptop = new Laptop("DELL", 16);
echo $laptop; // Affiche "Un PC DELL, avec 16GO de RAM"



/*
 * __serialize() et __unserialize()
 
 Les méthodes __serialize() et __unserialize() sont utilisées pour personnaliser la sérialisation et la désérialisation d'un objet.
*/

class Produit {
    private $nom;
    private $prix;

    public function __construct($nom, $prix) {
        $this->nom = $nom;
        $this->prix = $prix;
    }

    public function getNom() {
        return $this->nom;
    }

    public function __serialize() {
        return ['nom' => $this->nom, 'prix' => $this->prix];
    }

    public function __unserialize($donnees) {
        $this->nom = $donnees['nom'];
        $this->prix = $donnees['prix'];
    }
}

$produit = new Produit("HP EliteBook", 9000);
$serialise = serialize($produit);
echo $serialise;

echo "<br>";

$prodDeserialise = unserialize($serialise);
echo $prodDeserialise->getNom(); // Affiche "HP EliteBook"



/*
 * __clone()
 
 La méthode __clone() est utilisée pour définir le comportement lorsqu'un objet est cloné. Elle est appelée automatiquement lorsqu'un objet est cloné à l'aide de l'opérateur clone.
*/

class Voiture {
    public $nom;
    public $kilometrage;

    public function __construct($nom, $kilometrage) {
        $this->nom = $nom;
        $this->kilometrage = $kilometrage;
    }

    public function __clone() {
        // Personnaliser le comportement de clonage
        $this->nom = "Cloné : " . $this->nom;
        // Par exemple, on peut également changer le kilométrage de la voiture clonée
        $this->kilometrage = 0;
    }
}

$voiture = new Voiture("Peugeot", 50000);
$clonedVoiture = clone $voiture;
echo $clonedVoiture->nom; // Affiche "Cloné : Peugeot"
echo "<br>";
echo $clonedVoiture->kilometrage; // Affiche "0"



/*
 * __call() et __callStatic()
 
 Les méthodes __call() et __callStatic() sont utilisées pour intercepter les appels de méthodes qui n'existent pas.
*/

class MyClass {
    public function __call($nom, $arguments) {
        echo "La méthode $nom n'existe pas.";
    }

    public static function __callStatic($nom, $arguments) {
        echo "La méthode statique $nom n'existe pas.";
    }
}

$obj = new MyClass();
$obj->methodeInexistante(); // Affiche "La méthode methodeInexistante n'existe pas"
