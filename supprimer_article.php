<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style_supprimer.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="image/1f4f7.png">
    <title>Suppression</title>
</head>
<body>
<?php
include "header.php";
try {
        $bdd = new PDO("mysql:host=localhost;dbname=wepost;charset=utf8", 'root' , 'root');
    }catch (Exception $e){
        echo "Erreur :" . $e->getMessage();
    }
    $rss = $bdd->prepare('DELETE FROM photos WHERE id = ?');
    $rss->execute(array($_GET['id']));
?>
<h1>Suppression réalisé avec succès</h1>
<a href="index.php"><button class="button">Retour</button></a>
</body>
</html>

