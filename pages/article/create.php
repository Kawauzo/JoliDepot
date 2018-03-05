<?php
if (!empty($_POST['submit'])) {
  $pdo = new PDO(Config::getDatabaseDSN());
  $stmt = $pdo->prepare("INSERT INTO article (title, description, link) VALUES (:title, :description, :link)");
  $stmt->bindValue(':title', $_POST["title"]);
  $stmt->bindValue(':description', $_POST["description"]);
  $stmt->bindValue(':link', $_POST["link"]);
  $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter un article</title>
  </head>
  <body>
    <form action="?page=article&action=create" method="post">
      <p>
        <label for="title">Titre :</label>
        <input type="text" name="title">
      </p>
      <p>
        <label for="description">Description :</label><br>
        <textarea name="description" rows="8" cols="80"></textarea>
      </p>
      <p>
        <label for="title">Lien :</label>
        <input type="link" name="link"/>
      </p>
      <input type="submit" name="submit" value="Mettre en ligne">
    </form>
  </body>
</html>
