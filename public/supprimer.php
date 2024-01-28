<?php
    
    session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['motpass'])){
  header("location:authentifier.php");
}
require("connexion.php");
$sel = $conix->prepare("SELECT * FROM formateur");
$sel->execute();
$donne=$sel->fetch();
$count = $conix->prepare("SELECT * FROM affectation where matricule=?");
$count->execute([$donne['matricule']]);
if($count->rowCount()>=1){
     header("location:acceuil.php?msg=you cant delete this formateur");
}else{

    $r=$conix->prepare("DELETE FROM formateur where matricule=?");
    $r->execute(array($_GET['matricule']));
    header("location:acceuil.php");
}

    

?>  