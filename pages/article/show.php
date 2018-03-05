<?php
if (!empty($_GET['id']) ) {
  $id = $_GET['id'];

  $pdo = new PDO(Config::getDatabaseDSN());
  $stmt = $pdo->prepare("SELECT * FROM article WHERE id = :id");
  $stmt->bindValue(':id', $id);
  $stmt->execute();

  $article = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$article) {
    header('Location: //'.$_SERVER['HTTP_HOST'].'?page=article&action=index');
    exit;
  }
}
else {
  header('Location: //'.$_SERVER['HTTP_HOST'].'?page=article&action=index');
  exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?=$article['title'];?></title>
  </head>
  <body>
    <h2><?=$article['title'];?></h2>
    <p><?=$article['description'];?></p>
  </body>
</html>
