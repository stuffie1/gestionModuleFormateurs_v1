<?php

require("connexion.php");
$select = $conix->prepare("DELETE FROM affectation WHERE matricule=? AND sigle=?  ");
$select->execute([$_GET['matricule'],$_GET['sigle']]);
header("location:gererModule.php")


?>