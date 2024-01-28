<?php

require("connexion.php");
if(isset($_POST['sub'])){
$type=$_FILES['photo']['type'];
$location=$_POST['p1'];
if(!empty($_FILES['photo']['name'])){
if(strpos($type,"image/")===0){
$namefoto=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];
$location="images_V1/".$namefoto;
move_uploaded_file($tmp,$location);
}}
$modify=$conix->prepare("UPDATE formateur SET nom=?,prenom=?,photoProfil=?,dateNaissance=?,spécialité=? WHERE matricule=?");
$modify->execute([$_POST['nom'],$_POST['prenom'],$location,$_POST['date'],$_POST['spécialité'],$_POST['matricule']]);


header("location:acceuil.php");
}


?>