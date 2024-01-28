<?php

require("connexion.php");
if(isset($_POST['sub'])){
  $sel=$conix->prepare("SELECT * FROM formateur WHERE matricule=?");
  $sel->execute([$_POST['matricule']]);
  if ($sel->rowCount()>0){
      header("location:inserer.php?msg=ce formateur est exist deja!");
  }else{
$type=$_FILES['photo']['type'];
$location="";

if(strpos($type,"image/")===0){
$namefoto=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];
$location="images/".$namefoto;
move_uploaded_file($tmp,$location);
}
$ajout=$conix->prepare("INSERT INTO formateur(matricule,nom,prenom,photoProfil,dateNaissance,spécialité) VALUES (?,?,?,?,?,?)");
$ajout->execute([$_POST['matricule'],$_POST['nom'],$_POST['prenom'],$location,$_POST['date'],$_POST['spécialité']]);


header("location:acceuil.php");
}
}


?>