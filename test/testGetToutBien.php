<?php

include_once '../modeles/fonctionsAccesBDD.php';
$pdo=connectionBDD();

$lesBiens = getToutBiens($pdo);

var_dump($lesBiens);
