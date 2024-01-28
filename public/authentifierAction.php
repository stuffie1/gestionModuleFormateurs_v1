<?php
// session_status();

require("connexion.php");
$select = $conix->prepare("SELECT * FROM directeurpedagogique where email=? and motpass=?");
$select->execute([$_POST['login'], $_POST['motpass']]);

// if (empty($_POST['login']) || empty($_POST['motpass'])) {
//   header("location:authentification.php?msg=les données d'authentification sont obligatoires");
// }
if ($select->rowCount() < 1) {
  header("location:authentification.php?msg=les données d'authentification sont  incorrects");

} else {
  session_start();
  $_SESSION['login'] = $_POST['login'];
  $_SESSION['motpass'] = $_POST['motpass'];
  // echo $_POST['login']. $_POST['motpass'];
  header("location:acceuil.php");

}

// $email = $_POST['login'];

// if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//   echo "The email address is valid.";
// } else {
//   echo "The email address is invalid.";
// }


?>