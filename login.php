<?php
session_start();

host = 'localhost';dbname = 'espace_jaebeci';
user = 'root';pass = '';

try {
  pdo = new PDO("mysql:host=host;dbname=dbname;charset=utf8",user, pass);
 catch (PDOExceptione) {
  die("Erreur : " . e->getMessage());


if (_SERVER["REQUEST_METHOD"] === "POST") {
  email =_POST['email'];
  password =_POST['password'];

  stmt =pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
  stmt->execute([email]);
  user =stmt->fetch();

  if (user        password_verify(password, user['mot_de_passe']))_SESSION['user_id'] = user['id'];_SESSION['nom'] = $user['nom'];
    header("Location: ajouter_activite.html");
    exit();
  } else {
    echo "Email ou mot de passe incorrect.";
  }
}
?>
