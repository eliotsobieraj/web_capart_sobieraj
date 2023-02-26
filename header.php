<?php
ini_set('display_errors', 1);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="menutop.css">
    <title>Document</title>
</head>
<body>
<div class="headercontain">
    <div class="respmenucont">
        <button class="menubtnresp"><a href="index.php">Accueil</a></button>
        <button class="menubtnresp"><a href="upload.php">Upload</a></button>
    </div>
    <div class="header">
        <div class="menubar">
            <button class="menubtn"><a href="index.php">Accueil</a></button>
            <button class="menubtn"><a href="upload.php">Upload</a></button>
        </div>
        <form action="result_search.php" method="get" >
            <button class="searchbtn" type="submit" name="submit" value=1><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search " viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg></button>
            <input type="search" class="searchbar" placeholder="search" name="search_bar">
        </form>
        <img class="madamephoto" src="image/madamephoto.png" alt="">
    </div>
    <p id="accueil">Welcome on WePost</p>
</div>
<div id="triangle"></div>
</body>
</html>