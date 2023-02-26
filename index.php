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
<form action="" class="searchcont" method="post" >
    <button name="searchbtn" class="searchbtn" value="click" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search " viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button>
    <input type="text" name="search" class="searchbar" placeholder="search">
</form>
<?php
include 'header.php';
?>
<div class="boxcontainer">

    <?php
    while ($article = $id->fetch(PDO::FETCH_ASSOC)){
        $identifiant = htmlspecialchars($article['id']);
        echo '<div class="box">';
        echo'<button class="buttondetail"><a href="detail_article.php?id='.htmlspecialchars($identifiant).'">Détail</a></button>';
        echo '<h3>' . htmlspecialchars($article['title']) . '</h3>';
        echo '<img id="image" src="'. htmlspecialchars($article['location']).'">';
        echo '<p>' .htmlspecialchars($article['created_at']). '</p>';
        echo '<p>' .htmlspecialchars($article['pseudo']). '</p>';
        echo '</div>';
    }
    ?>
</div>
<?php
include 'footer.php';
?>
</body>
</html>