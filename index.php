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

    if (isset($_POST["searchbtn"])){
        $searchvalue = $_POST['search'];
        echo"<style>.boxcontainer{display: none} </style>";
        $searchid = $bdd->prepare("SELECT * FROM photos ORDER BY id DESC WHERE title like '$searchvalue'");
        $searchid->execute(array($searchvalue));
    while ($article = $searchid->fetch(PDO::FETCH_ASSOC)){
        echo '<h3>' . htmlspecialchars($article['title']) . '</h3>';
       echo '<img id="image" src="'. htmlspecialchars($article['location']).'">';
       echo '<img id="image" src="'. htmlspecialchars($article['location']).'">';

    }}
    while ($article = $id->fetch(PDO::FETCH_ASSOC)){
    $identifiant = htmlspecialchars($article['id']);
    echo '<div class="box">';
        #echo '<div id="top_box">';
            echo'<button class="buttondetail"><a href="detail_article.php?id='.htmlspecialchars($identifiant).'">Détail</a></button>';
            echo '<h3>' . htmlspecialchars($article['title']) . '</h3>';
            #echo '</div>';
        echo '<img id="image" src="'. htmlspecialchars($article['location']).'">';
        #echo '<div id="bottom_box">';
            #echo '<p>' .htmlspecialchars($article['file_name']). '</p>';
            echo '<p>' .htmlspecialchars($article['created_at']). '</p>';
            echo '<p>' .htmlspecialchars($article['pseudo']). '</p>';
            echo '</div>';

    }
    ?>


    </div>

<div class="footer">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
        <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512Z"/>
    </svg>
    Wepost 2023
</div>
</body>
</html>