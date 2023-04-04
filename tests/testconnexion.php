<?php
session_start();
if(isset($_SESSION['nom'])){
echo 'Vous êtes connecter en tant que'. $_SESSION['prenom']," ",$_SESSION['nom'];   
}
else{
    echo "Vous n'êtes pas connecter";
}
?>

  