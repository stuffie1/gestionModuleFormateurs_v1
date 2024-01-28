<?php

require("connexion.php");
if(isset($_POST['sub'])){
$ajout=$conix->prepare("INSERT INTO module(sigle,libelle,type,coef) VALUES (?,?,?,?)");
$ajout->execute([$_POST['sigle'],$_POST['libelle'],$_POST['type'],$_POST['coef']]);


header("location:acceuil.php");
}


?>