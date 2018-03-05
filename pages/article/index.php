<?php
$pdo = new PDO(Config::getDatabaseDSN());
$stmt = $pdo->prepare("SELECT * FROM article");
$stmt->execute();

$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Articles</title>
  </head>
  <body>
    <h1>Liste des articles :</h1>

    <?php foreach ( $articles as $article ):?>
      <h2><?=$article['title'];?></h2>
      <p><?=$article['description'];?></p>
      <hr>
    <?php endforeach; ?>


  </body>
</html>
