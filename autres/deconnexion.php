<?php
if(isset($_GET['deconnexion'])){
    session_destroy();
    header("Location: index.php");
}
?>