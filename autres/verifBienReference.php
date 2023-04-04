<?php 
include_once 'modeles/fonctionsAccesBDD.php';
if (isset($_GET['reference'])) {
    $db = connectionBDD();
    $reference = $_GET['reference'];
    $leBien = getBienByReference($db, $reference);
} else {
    ?><h1> la Page est introuvable.<h1><?php
}?>