<?php
include_once "autres/verifConnexion.php";
include_once "modeles/fonctionsAccesBDD.php";

$lepdo=connectionBDD();

include_once "vues/ajoutBien.php";

if(isset($_POST['submit'])){
    
    ajoutBien($lepdo, $_POST['saisieVille'], 
            $_POST['saisieType'], 
            $_POST['saisieJardin'], 
            $_POST['saisieSurface'], 
            $_POST['saisieNbPiece'], 
            $_POST['saisiePrix'], 
            $_POST['saisieDescription'], 
            $_POST['saisieImage']);

    header("Location: ?page=ajoutbien&BienAjoute=1");
}
