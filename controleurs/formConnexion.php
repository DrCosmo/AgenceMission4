<?php
include_once 'modeles/fonctionsAccesBDD.php';
include_once 'vues/formulaireConnexion.php';

if(isset($_SESSION['name'])){
    header('Location: ../index.php');
    exit;
}

if(!empty($_POST)){
    extract($_POST);

    if(isset($_POST['connexion'])){
        $name=$_POST['name'];
        $passwd=$_POST['passwd'];
        formConnexion($name,$passwd);
    }
}
?>