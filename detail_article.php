<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="style_detail.css">
    <link rel="icon" type="image/x-icon" href="image/1f4f7.png">
    <title>Détails</title>
</head>
<body>
    <?php
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=wepost;charset=utf8", 'root', 'root');
        } catch (Exception $e) {
            echo "Erreur :" . $e->getMessage();
        }
        include "header.php";
        $id = $bdd->prepare('SELECT * FROM photos WHERE id = ?');
        $id->execute(array($_GET['id']));
        $article = $id->fetch(PDO::FETCH_ASSOC);
        echo '<div id="box">';
        echo '<div id="top_box">';
        echo'<button class="button"><a href="index.php">Retour</a></button>';
        echo'<button class="button"><a href="modification.php?id='.htmlspecialchars($article['id']).'">Modifier</a></button>';
        echo'<button class="button"><a href="supprimer_article.php?id='.htmlspecialchars($article['id']).'">Supprimer</a></button>';
        echo '<h3>'. $article['title'] .'</h3>';
        echo '</div>';
        echo '<img id="image" src="' . $article['location'] . '">';
        echo '<div id="bottom_box">';
        echo '<p>' . $article['created_at'] . '</p>';
        echo '<p>' . $article['pseudo'] . '</p>';
        echo '</div>';
        echo '</div>';
    ?>
    <?php include "footer.php"?>
</body>
</html>