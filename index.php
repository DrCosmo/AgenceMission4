<?php
session_start();
include_once "autres/deconnexion.php";
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    header("location: index.php?page=home");
    exit();
}
include_once "inc/header.inc.php";
switch($page){

        case "home" :{
            echo'home';
            break;
        }
        case "lesbiens" :{
            include_once("controleurs/formSearch.php");
            include_once("vues/list.php");
            break;
        }
        case 'connexion' :{
            include_once("controleurs/formConnexion.php");
            break;
        }
        case 'ajoutbien' :{
            include_once("controleurs/ajoutBien.php");
            break;
        }
        case 'vuebien' :{
            include_once("vues/VueBien.php");
            break;
        }
        case 'pdf' :{
            include_once("controleurs/controleurPdf.php");
            break;
        }

}

include_once "inc/footer.inc.php";

?>
