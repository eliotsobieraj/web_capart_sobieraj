<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="image/1f4f7.png">
    <link href="style_modification.css" type="text/css" rel="stylesheet">
    <title>Modification</title>
</head>
<body>
    <?php
        include "header.php";
        try {
            $bd = new PDO("mysql:host=localhost;dbname=wepost;charset=utf8", 'root' , 'root');
        }catch (Exception $e){
            echo "Erreur :" . $e->getMessage();
        }

        $id = $bd->prepare('SELECT * FROM photos WHERE id = ?');
        $id->execute(array($_GET['id']));
        $article = $id->fetch(PDO::FETCH_ASSOC);
        $id_article = $id->fetchColumn();
    ?>
    <div id="box">
        <form method="post" action="" enctype="multipart/form-data" class="form">
            <div>
                <h3>Photo</h3>
                <button type="submit" class="retour"><a href="index.php">Retour</a></button>
            </div>
            <label for="titre">Enter titre</label><br><input type="text" name="titre_article" id="titre" value="<?php echo htmlspecialchars($article['title'])?>"><br>
            <label for="pseudo">Enter pseudo</label><br><input type="text" name="pseudo_article" id="pseudo" value="<?php echo htmlspecialchars($article['pseudo'])?>"><br>
            <label id="picture">Choose a picture:</label><br>
            <input type="file" id="image" name="article_image" accept="image/png, image/jpeg"><br>
            <button type="submit" id="ajouter">Modifier</button>
        </form>
        <?php
            if(!empty($_POST['titre_article']) && !empty($_FILES['article_image']) && !empty($_POST['pseudo_article'])){
                $titre_article = $_POST['titre_article'];
                $pseudo_article = $_POST['pseudo_article'];

                if($_FILES['article_image']['error'] == 0 && in_array(pathinfo($_FILES['article_image']['name'])['extension'], ['jpg', 'jpeg', 'png'])){
                    move_uploaded_file(htmlspecialchars($_FILES['article_image']['tmp_name']), "image/" . date("d-m-y") .$_FILES["article_image"]["name"]);
                }

                $rss = $bd->prepare('UPDATE photos SET pseudo=?, title=?, location=?, file_name=?, created_at=NOW() WHERE id = ?');
                $rss->execute(array($pseudo_article, $titre_article, "image/". date("d-m-y") . $_FILES["article_image"]["name"], $_FILES["article_image"]["name"], $id_article));
                echo "<p>Votre article a été modifié</p>";
            }else{
                echo "<p>Votre article n'a pas été modifié</p>";
            }
        ?>
    </div>
</body>
</html>

