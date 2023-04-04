<?php

include "../modeles/fonctionsAccesBDD.php";

$lepdo=connectionBDD();

include_once "../vues/search.php";

echo "</br></br></br>";

if(isset($_POST['submit'])){

    $noReference=$_POST['searchRef'];
    var_dump($noReference);
    $noVille=$_POST['villeList'];
    var_dump($noVille);
    $noType=$_POST['typeList'];
    var_dump($noType);
    $noJardin=$_POST['ChoixJardin'];
    var_dump($noJardin);
    $noPrixMax=$_POST['ChoixPrixMax'];
    var_dump($noPrixMax);
    $noPrixMin=$_POST['ChoixPrixMin'];
    var_dump($noPrixMin);
    $surfaceMin=$_POST['ChoixSurfaceMin'];
    var_dump($surfaceMin);
    $piecesMin=$_POST['ChoixPiecesMin'];
    var_dump($piecesMin);

    $recherche=getBiensSearch($lepdo, $_POST['villeList'], 
    $_POST['typeList'],
    $_POST['ChoixJardin'],
    $_POST['ChoixPrixMax'],
    $_POST['ChoixPrixMin'],
    $_POST['ChoixSurfaceMin'],
    $_POST['ChoixPiecesMin'],
    $_POST['searchRef']);

    echo "</br></br></br>";

    var_dump($recherche);

    
    /*header("Location: ?page=lesbiens&Recherche=1
    &reference$noReference
    &noVille=$noVille
    &noType=$noType
    &noJardin=$noJardin
    &noPrixMax=$noPrixMax
    &noPrixMin=$noPrixMin
    &ChoixSurfaceMin=$surfaceMin
    &ChoixPiecesMin=$piecesMin");*/
}