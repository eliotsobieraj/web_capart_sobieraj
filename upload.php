<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="image/1f4f7.png">
    <link rel="stylesheet" type="text/css" href="style_upload.css">
    <title>Ajouter une image</title>
</head>
<body>
<?php
include "header.php";
?>
<div id="box">
    <form method="post" action="" enctype="multipart/form-data" class="form">
        <div>
            <h3>Photo</h3>
            <button type="submit" class="retour"><a href="index.php">Retour</a></button>
        </div>
        <label for="titre">Enter titre</label><br><input type="text" name="titre_article" id="titre"><br>
        <label for="pseudo">Enter pseudo</label><br><input type="text" name="pseudo_article" id="pseudo"><br>
        <label id="picture">Choose a picture:</label><br>
        <input type="file" id="image" name="article_image" accept="image/png, image/jpeg"><br>
        <div id="check">
            <input type="checkbox" name="checkbox" id="checkbox">
            <label for="checkbox">I accept to give right of my photo (required)</label>
        </div>
        <button type="submit" id="ajouter">Ajouter</button>
    </form>
    <?php

    try {
        $bdd = new PDO("mysql:host=localhost;dbname=wepost;charset=utf8", 'root' , 'root');
    }catch (Exception $e){
        echo "Erreur :" . $e->getMessage();
    }

    if(!empty($_POST['titre_article']) && !empty($_FILES['article_image'] && !empty($_POST['pseudo_article']))){
        $titre_article = $_POST['titre_article'];
        $pseudo_article = $_POST['pseudo_article'];
        $tpm_image_article= $_FILES['article_image']['tmp_name'];
        $ext = pathinfo($_FILES['article_image']['name'])['extension'];
        $ext_verif = ['jpg', 'jpeg', 'png'];
        if(!empty($_FILES['article_image'])){
            if($_FILES['article_image']['error'] == 0 && in_array($ext, $ext_verif)){
                move_uploaded_file(htmlspecialchars($tpm_image_article), "image/" . date("d-m-y") .$_FILES["article_image"]["name"]);
            }
        }
        $rss = $bdd->prepare('INSERT INTO photos (pseudo, title, location, file_name, created_at) VALUES (?, ?, ?, ?, NOW())');
        $rss->execute(array( $pseudo_article, $titre_article, "image/". date("d-m-y") . $_FILES["article_image"]["name"], $_FILES["article_image"]["name"]));
        echo "<p>Votre photo a ??t?? post??</p>";
    }else{
        echo "<p>Votre photo n'a pas ??t?? post??</p>";
    }
    ?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
