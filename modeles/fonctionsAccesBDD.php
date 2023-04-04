<?php

function connectionBDD(){

    $server = "mysql:host=localhost;dbname=agence_immo";
    $username = "CASLOGEZ";
    $password = "CASLOGEZ";
    
    try {
        $conn = new PDO($server, $username, $password);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

function getVilles($pdo){

    $villeSql = $pdo->prepare('SELECT noVille,libelle FROM ville');
    $villeSql->execute();
    $lesVilles = $villeSql->fetchAll();
    
    return $lesVilles;
}

function getTypes($pdo){

    $typeSql = $pdo->prepare('SELECT noType,libelle FROM type');
    $typeSql->execute();
    $lesTypes = $typeSql->fetchAll();
    
    return$lesTypes;
}



function getBiensSearch($pdo, $ville, $type, $jardin, $prixMax, $prixMin, $surfaceMin, $piecesMin, $reference){
    $cpt=-1;
    $sql="SELECT description,img,jardin,nbpiece,prix,reference,surface,
    type.libelle as type_bien,
    ville.libelle as ville_nom 
    FROM bien 
    INNER JOIN type ON type = noType 
    INNER JOIN ville ON ville = noVille";
    if ($ville!=NULL || $type!=NULL || $jardin!=NULL || $prixMax!=NULL || $prixMin!=NULL || $surfaceMin!=NULL || $piecesMin!=NULL || $reference!=NULL) {
        $sql.=" WHERE";

        if ($ville!=NULL) {
            $cpt++;
        }
        if ($type!=NULL) {
            $cpt++;
        }
        if ($jardin!=NULL) {
            $cpt++;
        }
        if ($surfaceMin!=NULL) {
            $cpt++;
        }
        if ($piecesMin!=NULL) {
            $cpt++;
        }
        if ((($prixMax!=NULL && $prixMin==NULL) || ($prixMax==NULL && $prixMin!=NULL))) {
            $cpt++;
        }elseif ($prixMax!=NULL && $prixMin!=NULL) {
            $cpt++;
        }
        if ($reference!=NULL) {
            $cpt++;
        }

        if ($ville!=NULL) {
            $sql.=" ville= :villeChoisi";
            if($cpt>0){
                $sql.=" and";
                $cpt--;
            }
        }
        if ($type!=NULL) {
            $sql.=" type= :typeChoisi";
            if($cpt>0){
                $sql.=" and";
                $cpt--;
            }
        }
        if ($jardin!=NULL) {
            $sql.=" jardin= :jardinChoisi";
            if($cpt>0){
                $sql.=" and";
                $cpt--;
            }
        }
        if ($surfaceMin!=NULL) {
            $sql.=" surface>= :surfaceChoisi";
            if($cpt>0){
                $sql.=" and";
                $cpt--;
            }
        }
        if ($piecesMin!=NULL) {
            $sql.=" nbpiece>= :pieceMin";
            if($cpt>0){
                $sql.=" and";
                $cpt--;
            }
        }

        if ((($prixMax!=NULL && $prixMin==NULL) || ($prixMax==NULL && $prixMin!=NULL))) {
            if ($prixMax!=NULL) {
                $sql.=" prix<= :prixMin";
                if($cpt>0){
                    $sql.=" and";
                    $cpt--;
                }
            }else {
                $sql.=" prix>= :prixMin";
                if($cpt>0){
                    $sql.=" and";
                    $cpt--;
                }
            }
        }elseif ($prixMax!=NULL && $prixMin!=NULL) {
            $sql.=" (prix BETWEEN :prixMin and :prixMax)";
            if($cpt>0){
                $sql.=" and";
                $cpt--;
            }
        }
    }
    if ($reference!=NULL) {
        $sql.=" reference= :reference";
        if($cpt>0){
            $sql.=" and";
            $cpt--;
        }
    }

    $getBien=$pdo->prepare($sql);

    if ($ville!=NULL) {
        $getBien->bindValue(':villeChoisi' , $ville);
    }
    if ($type!=NULL) {
        $getBien->bindValue(':typeChoisi' , $type);
    }
    if ($jardin!=NULL) {
        $getBien->bindValue(':jardinChoisi' , $jardin);
    }
    if ($surfaceMin!=NULL) {
        $getBien->bindValue(':surfaceChoisi' , $surfaceMin);
    }
    if ($piecesMin!=NULL) {
        $getBien->bindValue(':piecesMin' , $piecesMin);
    }
    if ((($prixMax!=NULL && $prixMin==NULL) || ($prixMax==NULL && $prixMin!=NULL))) {
        if ($prixMax!=NULL) {
            $getBien->bindValue(':prixMax' , $prixMax);
        }else {
            $getBien->bindValue(':prixMin' , $prixMin);
        }
    }elseif ($prixMax!=NULL && $prixMin!=NULL) {
        $getBien->bindValue(':prixMin' , $prixMin);
        $getBien->bindValue(':prixMax' , $prixMax);
    }
    if ($reference!=NULL) {
        $getBien->bindValue(':reference' , $reference);
    }
    $executionOk = $getBien->execute();
    $lesBiens=$getBien->fetchAll();
    return $lesBiens;
}

function supprimerBien($reference){
    $bd=connectionBDD();
    $sql= "DELETE from bien WHERE reference=$reference";
    $supprBien=$bd->prepare($sql);
    $supprBien->execute();
}

function formConnexion($name,$passwd){

    $bd=connectionBDD();
$infoUser=$bd ->prepare("SELECT hachage FROM membres WHERE nom=?");
$infoUser->execute(array($name));
$infoUser=$infoUser->fetch();


 if (isset($infoUser['hachage'])) {
     if(password_verify($passwd, $infoUser['hachage'])){
        login($name,$bd);
     }
     else{
        
        echo "Nom d'utilisateur ou mot de passe incorrect";
     }
    } else {
        
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}

function login($name,$bd){
    $infoUser=$bd ->prepare("SELECT nom,prenom,hachage FROM membres WHERE nom=?");
    $infoUser->execute(array($name));
    $infoUser=$infoUser->fetch();

    $_SESSION['nom'] = $infoUser['nom'];
    $_SESSION['prenom'] = $infoUser['prenom'];
    header('Location: index.php');
}
function getToutBiens($pdo){
    $sql= "SELECT description,img,jardin,nbpiece,prix,reference,surface,type.libelle as type_bien,ville.libelle as ville_nom FROM bien INNER JOIN type ON type = noType INNER JOIN ville ON ville = noVille"; 
    // J'utilise les "as" pour rennomer les libelle car sinon le dexième libelle écrase le premier"
    $getBien = $pdo->prepare($sql);
    $getBien->execute();
    $biens=$getBien->fetchAll();
    return $biens;
}

function getBienByReference($bd, $reference){
    $sql= "SELECT description,img,jardin,nbpiece,prix,surface,type.libelle as type_bien,ville.libelle as ville_nom FROM bien INNER JOIN type ON type = noType INNER JOIN ville ON ville = noVille WHERE reference=?";
    $getBien = $bd->prepare($sql);
    $getBien->execute(array($reference));
    $bien=$getBien->fetch();
    return $bien;
}

function ajoutBien( $pdo, 
                    $ville, 
                    $type, 
                    $jardin, 
                    $surface, 
                    $nbPiece, 
                    $prix, 
                    $description, 
                    $urlImage){
    
    $ajoutBien=$pdo->prepare("INSERT INTO `bien` (`reference`, `nbpiece`, `jardin`, `surface`, `prix`, `ville`, `type`, `description`, `img`) "
            . "VALUES (NULL, :nbpiece, :jardin, :surface, :prix, :ville, :type, :description, :img); ");
    $ajoutBien->bindValue(':nbpiece' , $nbPiece);
    $ajoutBien->bindValue(':jardin' , $jardin);
    $ajoutBien->bindValue(':surface' , $surface);
    $ajoutBien->bindValue(':prix' , $prix);
    $ajoutBien->bindValue(':ville' , $ville);
    $ajoutBien->bindValue(':type' , $type);
    $ajoutBien->bindValue(':description' , $description);
    $ajoutBien->bindValue(':img' , $urlImage);
    $ajoutBien->execute();
}
