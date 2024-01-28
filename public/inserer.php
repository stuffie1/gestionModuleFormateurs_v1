<?php
session_start();
require("connexion.php");
if (!isset($_SESSION['login']) && !isset($_SESSION['motpass'])){
  header("location:authentifier.php");
}


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
  <h1 class=" mb-4 text-black ">Ajouter un stagiaire</h1>
  <form action="insererAction.php" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validateAndRedirect()" >
       <label class="form-label h6">Matricule </label><br>
       <input type="text" name="matricule" class="input-group  mb-3" id="matricule"><br>
       <p id="pm" class="text-danger h6"></p>
       <?php
     if(isset($_GET['msg'])){

       ?>
       <p id="p1" style="color:red ;display:block" class=" h5 text-danger" id="h3"><?php echo $_GET['msg']; ?></p>
     <?php } ?>
    
       <label class="form-label h6">Nom </label><br>
       <input type="text" name="nom" class="input-group  mb-3" id="nom"><br>
       <p id="pn"  class="text-danger h6"></p>
      <label class="form-label h6">Prenom </label><br>
      <input type="text" name="prenom"  class="input-group  mb-3"><br>
      <label class="form-label h6">Photo </label><br>
      <input type="file" name="photo"  class="input-group  mb-3"><br>
      <label class="form-label h6">Date naissance </label><br>
      <input type="date" name="date"  class="input-group  mb-3" id="dateNaissance" value="1970-01-01"><br>
       <p id="pd"  class="text-danger h6"></p>
      <label class="form-label h6">Specialite: </label><br>
      <input type="text" name="spécialité"  class="input-group  mb-3"><br>
      <br>
      <input type="submit" value="ajouter" name="sub"class='btn btn-success fw-bolder w-100'>




  </form>
  </div>

  <script>
function validateAndRedirect() {
  var matricule = document.getElementById("matricule").value;
  var nom = document.getElementById("nom").value;
  var dateNaissance = document.getElementById("dateNaissance").value;
  var pm = document.getElementById("pm");
  var pn = document.getElementById("pn");
  var pd = document.getElementById("pd");
  var p1 = document.getElementById("p1");

  var matriculePattern = /^[a-zA-Z0-9]{6}$/;
  var nomPattern = /^[a-zA-Z\s]{2,50}$/;

  if (!matriculePattern.test(matricule)) {
    pm.style.display = "block";
    p1.style.display = "none";
    pm.textContent = "Format invalide pour le matricule !";
    return false;
  } else {
    pm.style.display = "none";
  }

  if (!nomPattern.test(nom)) {
    pn.style.display = "block";
    pn.textContent = "Format invalide pour le nom !";
    return false;
  } else {
    pn.style.display = "none";
  }

  var selectedDate = new Date(dateNaissance);
  var minDate = new Date("1970-01-01");
  var maxDate = new Date("2004-12-31");
  if (selectedDate < minDate || selectedDate >maxDate) {
    pd.style.display = "block";
    pd.textContent = "La date de naissance n'est pas valide!";
    return false;
  } else {
    pd.style.display = "none";
  }
  
  return true; 
}
</script>

</body>
</html>