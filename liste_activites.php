<?php
host = 'localhost';dbname = 'espace_jaebeci';
user = 'root';pass = '';

try {
  pdo = new PDO("mysql:host=host;dbname=dbname;charset=utf8",user, pass);pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException e) 
  die("Erreur : " .e->getMessage());
}

activites =pdo->query("SELECT * FROM activites ORDER BY date_activite DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des Activités</title>
  <style>
    .carte { border: 1px solid #ccc; padding: 10px; margin: 10px; max-width: 400px; }
    img { max-width: 100%; height: auto; }
  </style>
</head>
<body>
  <h2>Nos Activités</h2>

  <?php foreach (activites asact) : ?>
    <div class="carte">
      <h3><?= htmlspecialchars(act['titre']) ?></h3>
      <p><?= nl2br(htmlspecialchars(act['description'])) ?></p>
      <p><strong>Date :</strong> <?= act['date_activite'] ?></p>
      <?php if (act['image']) : ?>
        <img src="uploads/<?= htmlspecialchars($act['image']) ?>" alt="Image activité">
      <?php endif; ?>
    </div>
  <?php endforeach; ?>

</body>
</html>
