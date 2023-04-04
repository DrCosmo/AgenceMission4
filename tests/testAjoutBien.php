<?php

include_once '../modeles/fonctionsAccesBDD.php';

$lepdo=connectionBDD();

echo "apres include bdd</br>";


ajoutBien($lepdo, 2, 
          1, 
          1, 
          25, 
          9, 
          25000, 
            "description test", 
            "url/img");