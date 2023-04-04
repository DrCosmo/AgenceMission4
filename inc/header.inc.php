<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>IMMO MISSION 3</title>
</head>
<body>
    <header>
        <div>
            <h1>AGENCE IMMOBILIERE</h1>
        </div>
        <nav>
            <a href="?page=home" id="navHome"  class="<?php if ( $_GET['page'] == "home" ) { echo "selected"; } ?>">HOME</a>
            <a href="?page=lesbiens" id="navLesBiens" class="<?php if ( $_GET['page'] == "lesbiens" ) { echo "selected"; } ?>">LES BIENS</a>
            <?php if(isset($_SESSION['nom'])){ ?>
            <a href="?page=ajoutbien" id="navAjoutBien" class="<?php if ( $_GET['page'] == "ajoutbien" ) { echo "selected"; } ?>">AJOUT BIEN</a>
            <?php } 
            else{ ?>
            <a href="?page=connexion" id="navConnexion" class="<?php if ( $_GET['page'] == "connexion" ) { echo "selected"; } ?>">CONNEXION</a>
            <?php } ?>
        </nav>
        <?php include_once "controleurs/userBox.php"; ?>
    </header>
    <div class="page">
