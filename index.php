<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=wepost;charset=utf8", 'root' , 'root');
}catch (Exception $e){
    echo "Erreur :" . $e->getMessage();
}
$id = $bdd->prepare('SELECT * FROM photos ORDER BY id DESC');
$id->execute();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="image/1f4f7.png">
    <link rel="stylesheet" type="text/css" href="style_index.css">
    <title>Page d'accueil</title>
</head>
<body>
    <?php
        include 'header.php';

    while ($article = $id->fetch(PDO::FETCH_ASSOC)){
    $identifiant = htmlspecialchars($article['id']);
    echo '<div id="box">';
        echo '<div id="top_box">';
            echo'<button class="button"><a href="detail_article.php?id='.htmlspecialchars($identifiant).'">Détail</a></button>';
            echo '<h3>' . htmlspecialchars($article['title']) . '</h3>';
            echo '</div>';
        echo '<img id="image" src="'. htmlspecialchars($article['location']).'">';
        echo '<div id="bottom_box">';
            echo '<p>' .htmlspecialchars($article['file_name']). '</p>';
            echo '<p>' .htmlspecialchars($article['created_at']). '</p>';
            echo '<p>' .htmlspecialchars($article['pseudo']). '</p>';
            echo '</div>';
            echo '</div>';
    }
    ?>
</body>
</html>