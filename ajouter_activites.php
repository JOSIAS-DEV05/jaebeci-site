<?php
session_start();
if (!isset(_SESSION['user_id'])) {
  header("Location: connexion.html");
  exit();
}
?>

<?php
host = 'localhost';dbname = 'espace_jaebeci';
user = 'root';pass = '';

try {
  pdo = new PDO("mysql:host=host;dbname=dbname;charset=utf8",user, pass);pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException e) 
  die("Erreur de connexion : " .e->getMessage());
}

if (_SERVER['REQUEST_METHOD'] === 'POST')titre = htmlspecialchars(_POST['titre']);description = htmlspecialchars(_POST['description']);date_activite = _POST['date_activite'];

  // Gestion de l’imageimage_name = null;
  if (isset(_FILES['image'])_FILES['image']['error'] === 0) {
    image_tmp =_FILES['image']['tmp_name'];
    image_name = basename(_FILES['image']['name']);
    move_uploaded_file(image_tmp, "uploads/" .image_name);
  }

  // Insertion
  stmt =pdo->prepare("INSERT INTO activites (titre, description, date_activite, image) VALUES (?, ?, ?, ?)");
  stmt->execute([titre, description,date_activite, $image_name]);

  echo "Activité ajoutée avec succès.";
}
?>
