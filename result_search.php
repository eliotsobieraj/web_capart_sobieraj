<?php
include "header.php";
try {
    $bdd = new PDO("mysql:host=localhost;dbname=wepost;charset=utf8", 'root' , 'root');
}catch (Exception $e){
    echo "Erreur :" . $e->getMessage();
}
if (!empty($_GET['search_bar']) && $_GET['submit'] == 1){
    $research = $_GET["search_bar"];
    $id = $bdd ->prepare("SELECT * FROM photos WHERE title LIKE ? OR pseudo LIKE ? OR location LIKE ?");
    $id->execute(array($research, $research, $research));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_search.css">
    <title>Résultats</title>
</head>
<body>
    <?php
        echo '<h1>Result for search "'. htmlspecialchars($research) .'"</h1>'
    ?>
    <button type="submit" class="retour"><a href="index.php">Retour</a></button>
    <?php
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
        include 'footer.php';?>
</body>
</html>

<?php }
else{
    echo ("Veuillez rentrer rentrer quelque chose dans la barre de cherche");
    include 'footer.php';
}?>