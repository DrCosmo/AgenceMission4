<?php

require('fpdf/WriteHTML.php');

include_once 'modeles/fonctionsAccesBDD.php';
//include_once 'vues/pdf.php';

$pdo=connectionBDD();

$bien=getBienByReference($pdo, $_GET['reference']);
$reference=$_GET['reference'];

if($bien['jardin']==1){
    $jardin='oui';
}else{
    $jardin='non';
}
$img=$bien['img'];

$html= '<h1>Details du bien de reference '.$reference.'</h1><br><hr><br>'
        . '<h1>Type :  '.$bien['type_bien'].'</h1><br><br>'
        . '<h1>Ville :  '.$bien['ville_nom'].'</h1><br><br>'
        . '<h1>Prix :  '.$bien['prix'].' Euros</h1><br><br>'
        . '<h1>Surface :  '.$bien['surface'].' metre carre</h1><br><br>'
        . '<h1>Jardin :  '.$jardin.'</h1><br><br>'
        . '<h1>Nombres de pieces :  '.$bien['nbpiece'].'</h1><br><br>'
        . '<h1>Description :  '.$bien['description'].'</h1><br><br>';


ob_start();
$pdf=new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('Arial');
$pdf->WriteHTML($html);
$pdf->Image($img, null, null, null, 50);
$pdf->Output();
//$pdf->Output('D','bien.pdf');  //Force le download du pdf
ob_end_flush();

?>