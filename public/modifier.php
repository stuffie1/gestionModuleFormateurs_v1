<?php
session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['motpass'])){
  header("location:authentifier.php");
}
require("connexion.php");
$sel=$conix->prepare("SELECT * FROM formateur where matricule=?");
$sel->execute([$_GET["matricule"]]);
$donne=$sel->fetch(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">

  <style>
    a{
      text-decoration: none;
      width:100px;
      color: green;
      
      font-weight: bolder;
      display: flex;
      flex-wrap: nowrap;
      justify-content: space-evenly;
    }
  </style>
</head>
<body>
<nav class="nav nav-bar py-4 bg-dark justify-content-between">
    <div class="d-flex ">
    <a href="acceuil.php"><img src="images/image1.jpg" style="width:55px;height:55px" class="rounded-5 ms-3"></a>
     <ul class="d-flex">
      <li><a href="inserer.php" class="nav-link text-light">ajouter formateur</a></li>
      <li><a  href="ajouterModule.php" class="nav-link text-light">ajouter module</a></li>
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
  <h1 class=" mb-4 text-black ">Modifier un formateur</h1>
  <form action="modifierAction.php" method="POST" enctype="multipart/form-data" autocomplete="off">
       <input type="hidden" name="matricule" value="<?php echo $_GET['matricule'] ?> " ><br>
       <label class="form-label h6">NOM </label><br>
      <input type="text" name="nom" value="<?php echo $donne->nom   ?>" class="input-group  mb-3"><br>
      <label class="form-label h6">prenom </label><br>
      <input type="text" name="prenom" value="<?php echo $donne->prenom   ?>" class="input-group  mb-3"><br>
      <label class="form-label h6">photo </label><br>
      <input type="file" name="photo" class="input-group  mb-3"><br>
      <input type="hidden" name="p1" value="<?php echo $donne->photoProfil   ?>"><br>
      <label class="form-label h6">date neissance </label><br>
      <input type="date" name="date" value="<?php echo $donne->dateNaissance   ?>" class="input-group  mb-3"><br>
      <label class="form-label h6">specialite: </label><br>
      <input type="text" name="spécialité" value="<?php echo $donne->spécialité   ?>" class="input-group  mb-3"><br>
      <br>
      <input type="submit" value="modifier" name="sub" class='btn btn-success fw-bolder w-100'>




  </form>
  </div>

</body>
</html>