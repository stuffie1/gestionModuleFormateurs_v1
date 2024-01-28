<?php

require("connexion.php");
if(isset($_POST['sub'])){
$ajout=$conix->prepare("INSERT INTO affectation(matricule,sigle,filiereGroupe) VALUES (?,?,?)");
$ajout->execute([$_POST['matricule'],$_POST['sigle'],$_POST['filiereGroupe']]);


header("location:acceuil.php");
}


?>