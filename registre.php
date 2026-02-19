<?php
session_start();

// Connexion à la base de données
host = 'localhost';dbname = 'espace_jaebeci';
user = 'root';pass = '';

try {
    pdo = new PDO("mysql:host=host;dbname=dbname;charset=utf8",user, pass);pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException e) 
    die("Erreur de connexion : " .e->getMessage());
}

// Traitement du formulaire
if (_SERVER["REQUEST_METHOD"] === "POST") 
    if (isset(_POST['nom'], _POST['email'],_POST['password'])) {
        nom = htmlspecialchars(trim(_POST['nom']));
        email = htmlspecialchars(trim(_POST['email']));
        password = password_hash(_POST['password'], PASSWORD_DEFAULT);

        try {
            stmt =pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)");
            stmt->execute([nom, email,password]);
            echo "Inscription réussie. <a href='connexion.html'>Connectez-vous ici</a>";
        } catch (PDOException e) 
            echo "Erreur lors de l'inscription : " .e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
