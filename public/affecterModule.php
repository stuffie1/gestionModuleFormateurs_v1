<?php
session_start();
require("connexion.php");
if (!isset($_SESSION['login']) && !isset($_SESSION['motpass'])){
  header("location:authentifier.php");
}

$select=$conix->prepare("SELECT * FROM module WHERE sigle NOT IN (SELECT sigle FROM affectation WHERE matricule = ?)");
$select->execute([$_GET['matricule']]);


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">


</head>
<body>
<nav class="nav nav-bar py-4 bg-dark justify-content-between">
    <div class="d-flex ">
    <a href="acceuil.php"><img src="images/image1.jpg" style="width:55px;height:55px" class="rounded-5 ms-3"></a>
     <ul class="d-flex">
      <li><a href="inserer.php" class="nav-link text-light">ajouter formateur</a></li>
      <li><a href="ajouterModule.php" class="nav-link text-light">ajouter module</a></li>
      <li><a href="gererModule.php" class="nav-link text-light">gerer module</a></li>
      <li><a href="deconnecter.php"class="nav-link text-light">se deconnecter</a></li>
     </ul>
     </div>
     <div class="me-3">
        <form action="search.php">
          <input type="text" name="search" id="">
          <input type="submit" value="search" class="btn btn-primary">
        </form>
     </div>
  </nav>
<div class="w-50 my-5 mx-auto py-3 px-5 bg-light">
  <h1 class=" mb-4 text-black ">Ajouter un Module</h1>
  <form action="affecterModuleAction.php" method="POST" enctype="multipart/form-data" autocomplete="off" >
    <input type="hidden" name="matricule" value="<?php echo $_GET['matricule']?>">
 <label for="" class="form-label h6">spécialité</label>
 <select name="sigle"  class="form-select w-100" >
   <?php   while($ligne=$select->fetch(PDO::FETCH_OBJ)){    ?>
            <option value="<?php echo $ligne->sigle ?>" ><?php echo $ligne->libelle ?></option>
          <?php }?>
      </select><br>
    <label for=""class="form-label h6">Group</label>
    <input type="text" name="filiereGroupe"  class="input-group  mb-3">

       
      <input type="submit" value="ajouter" name="sub"class='btn btn-success fw-bolder w-100'>




  </form>
  </div>
</body>
</html>