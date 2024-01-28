<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['motpass'])) {
  header("location:acceuil.php");
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
    #validationResult {
      display: none;
    }
  </style>
</head>

<body>
  <nav class="nav nav-bar py-4 bg-dark">
    <h1 class="text-light m-auto">authentification</h1>
  </nav>
  <div class="w-50 my-5 mx-auto px-5">

    <form action="authentifierAction.php " method="POST" autocomplete="off" class="my-5">
      <label class="form-label h5 mb-3">Email </label> <br>
      <input type="email" name="login" class="input-group  mb-3" id="email" autocomplete="off"><br>
      <label class="form-label h5 mb-3">password </label> <br>
      <input type="password" name="motpass" class="input-group  mb-3"><br>
      <label for="">Remomber me</label>
      <input type="checkbox" name="cookie" class="">
      <input type="submit" name="" id="" class='btn btn-warning fw-bolder w-100'>
      <p id="validationResult"></p><br>
    </form>

    <?php
    if (isset($_GET['msg'])) {

      ?>
      <h3 style="color:red ;display:block" class="alert h5 alert-danger" id="h3">
        <?php echo $_GET['msg']; ?>
      </h3>
    <?php } ?>
  </div>


  <script>
    let h3 = document.getElementById("h3");
    const emailInput = document.getElementById("email");
    const passwordInput = document.querySelector("input[name='motpass']");
    const validationResult = document.getElementById("validationResult");
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
      event.preventDefault();

      const email = emailInput.value;
      const password = passwordInput.value;

      if (email.trim() === "" || password.trim() === "") {
        validationResult.textContent = "Tout les champs d'authentification sont obligatoires!";
        validationResult.style.display = "block";
        validationResult.classList.add("text-danger");
        validationResult.classList.remove("text-success");
        validationResult.classList.add("alert-danger");
        validationResult.classList.add("alert");
        validationResult.classList.add("h5");
        validationResult.classList.add("mt-5");
        h3.style.display = "none";
        return;
      }

      const emailRegex = /^[^\s@]+@[^\s@]+\.([a-zA-Z]{2,}|com|net|org|xyz)$/;
      const passwordRegex = /^.{8,32}$/;
      if (!emailRegex.test(email) || !passwordRegex.test(password)) {
        validationResult.textContent = "Email ou mot de passe invalide.";
        validationResult.classList.add("text-danger");
        validationResult.classList.add("alert-danger");
        validationResult.classList.add("alert");
        validationResult.classList.add("h3");
        validationResult.classList.remove("text-success");
        validationResult.style.display = "block";
        h3.style.display = "none";
        return;
      }



      form.submit();
    });

  </script>

</body>

</html>