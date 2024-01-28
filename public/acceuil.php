<?php
session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['motpass'])) {
  header("location:authentifier.php");
}
require("connexion.php");

$select = $conix->prepare("SELECT * FROM formateur");
$select->execute();
$sel = $conix->prepare("SELECT * FROM formateur");
$sel->execute();
if($sel->rowCount()>0){
$donne=$sel->fetch();
$count = $conix->prepare("SELECT * FROM affectation where matricule=?");
$count->execute([$donne['matricule']]);
$nbrma=$count->rowCount();}
$admin = $conix->prepare("SELECT * FROM directeurpedagogique where email=? and motpass=?");
$admin->execute([$_SESSION['login'], $_SESSION['motpass']]);
$administrateur = $admin->fetch(PDO::FETCH_OBJ);



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
    

    tr {

      text-align: center;
      margin: 15px;
    }

    span {
      color: orangered;
    }

    h1 {

      text-align: center;
    }


    td,
    th {
      padding: 15px;
      font-weight: 500;
  

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
          <input type="search" name="search">
          <input type="submit" value="search" class="btn btn-primary">
        </form>
     </div>
  </nav>
  <div class="container my-5">
  <?php 
    $currentHour = date("H");
    $msg="";


    if ($currentHour >= 0 && $currentHour <= 12) {
      $msg="BONJOUR";
    }else{
      $msg="BONSOIRE";
    }
    ?>
  <h1 class="m-5"><?php echo $msg ?> <span>
      <?php echo strtoupper($administrateur->nom) . " " . ucwords($administrateur->prenom) ?>
    </span></h1>
 <p class="text-dark ms-4 h6">liste de formateur</p>

  <table class="m-2  w-100">
    <tr class="bg-success">
      <th>Matricule</th>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Photo</th>
      <th>Age</th>
      <th>Specialiter</th>
      <th>Nombre module Affecter</th>
      <th>Gerer</th>
      <th>Affecter</th>
    </tr>
    <?php
    while ($ligne = $select->fetch(PDO::FETCH_OBJ)) {
      $now = new DateTime();
      $date=date_create($ligne->dateNaissance);
      $diff = date_diff($date,$now)->y;
      ?>
      <tr>
        <td>
          <?php echo $ligne->matricule ?>
        </td>
        <td>
          <?php echo $ligne->nom ?>
        </td>
        <td>
          <?php echo $ligne->prenom ?>
        </td>
        </td>
        <td><img src="<?php echo $ligne->photoProfil ?>" height='50px' width='50px'></td>
        <td>
          <?php echo $diff ?>
          
        </td>
        <td>
          <?php echo $ligne->spécialité	 ?>
        </td>
        <td>
        <?php echo $nbrma ?></td>
        
        <td class="d-flex justify-content-between">
          <a href="modifier.php?matricule=<?php echo $ligne->matricule ?>" class="nav-link">modifier</a>
          <a onclick="return confirm('vous etes sure?!')" href="supprimer.php?matricule=<?php echo $ligne->matricule ?> "class="nav-link">Supprimer</a>
          </td>
        <td>
          <a href="affecterModule.php?matricule=<?php echo $ligne->matricule ?>" class="nav-link">Affecter Module</a>
          <a  href="listerModule.php?matricule=<?php echo $ligne->matricule ?> "class="nav-link">Lister module</a>
          </td>

      </tr>
    <?php } ?>
  </table>

  </div>
</body>

</html>