<?php
// La redéfinition (Override) permet à une classe dérivée de fournir une nouvelle implémentation d'une méthode déjà définie dans la classe parente.


// Classe Personne
class Personne {
    public function sePresenter() {
        echo "Bonjour, je suis une personne";
    }
}





// Classe Employe
class Employe extends Personne {
    public function sePresenter() {
        echo "Bonjour, je suis un employé";
    }
}

// Utilisation de la classe Employe
$employe = new Employe();
$employe->sePresenter();  // Affiche "Bonjour, je suis un employé"
echo "<br><br>";





// Classe Chef
class Chef extends Employe {    
    public function sePresenter() {
        parent::sePresenter();
        echo "<br>";
        echo "Mais exectement je suis un chef 🙂";
    }
}

// Utilisation de la classe Chef
$chef = new Chef();
$chef->sePresenter();

/*
Affiche :
Bonjour, je suis un employé
Mais exectement je suis un chef 🙂
*/