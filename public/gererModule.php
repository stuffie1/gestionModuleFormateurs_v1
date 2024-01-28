<?php
require("connexion.php");
$select = $conix->prepare("SELECT * FROM formateur,module,affectation WHERE formateur.matricule=affectation.matricule AND module.sigle=affectation.sigle  ");
$select->execute();

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
          <input type="text" name="search" id="">
          <input type="submit" value="search" class="btn btn-primary">
        </form>
     </div>
  </nav>
  <div class="container my-5">
  <h1 class="text-dark ms-4 h6">Gerer les Modules</h1>
  <table class="m-2  w-100 ">
    <tr class="bg-warning ">
          <th>Sigle</th>
          <th>Libelle</th>
          <th>Nom de Formateur</th>
          <th>Prenom de Formateur</th>
          <th>Type</th>
          <th>Action</th>
        
    </tr>
    <?php
    while ($ligne = $select->fetch(PDO::FETCH_OBJ)) {
    ?>
      <tr>
        <td><?php echo $ligne->sigle; ?></td>
        <td><?php echo $ligne->libelle; ?></td>
        <td><?php echo $ligne->nom; ?></td>
        <td><?php echo $ligne->prenom; ?></td>
        <td><?php echo $ligne->type; ?></td>
        <td><a href="desafecter.php?matricule=<?php echo $ligne->matricule; ?>&sigle=<?php echo $ligne->sigle; ?>">desafecter</a></td>
    
        
     
      </tr>
    <?php } ?>
  </table>
  </div>
</body>
</html>

