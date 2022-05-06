<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="registrierung.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>Registrierungs Formular</title>
</head>
<body>

  <div class="login-wrapper">
    <form action="" class="form" method="post">
      <img src="avatar.png" alt="">
      <h2> Registrieren </h2>
      <div class="input-group">
        <input type="text" name="registerName" id="registerName" required>
        <label for="registerName"> Name </label>
      </div>
      <div class="input-group">
        <input type="email" name="registerEmail" id="registerEmail" required>
        <label for="registerEmail"> Email </label>
      </div>
      <div class="input-group">
        <input type="password" name="registerPasswort" id="registerPasswort" required>
        <label for="registerPasswort"> Passwort </label>
      </div>
      <div class="input-group">
        <input type="password" name="registerPasswort2" id="registerPasswort2" required>
        <label for="registerPasswort2"> Passwort wiederholen</label>
      </div>

      <input type="submit" value="Registrieren" class="submit-btn">

      <a href="index.php" class="account-exists">Du hast schon ein Account? <br> Log dich jetzt ein! </a>

      <?php
      if(isset($_POST['registerPasswort'], $_POST['registerPasswort2'])){
        if($_POST['registerPasswort'] != $_POST['registerPasswort2'])
          {
            die("Die Passwörter sind nicht gleich");
          }
          }
      if(isset($_POST['registerEmail'],$_POST['registerPasswort'])){
        include "config.inc.php";

        $email = $_POST['registerEmail'];
        $password = $_POST['registerPasswort'];
        $name = $_POST['registerName'];
        $table="users";
        $error = false;

        if(filter_var($email,FILTER_VALIDATE_EMAIL)){

        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $name = trim($name);


      }else{
        $error = true;
      }


        if($email == null || $password == null) return;

        if(!$error) {
                $passwort_hash = password_hash($password, PASSWORD_DEFAULT);

                $statement = $conn->prepare("INSERT INTO users (email, passwort, name) VALUES (:email, :passwort, :name)");
                $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'name' => $name));
              }
      /*
        $hash = password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO $table (email, passwort, name)
             VALUES ('$email', '$hash', '$name')";

        $conn->exec($sql);
        */

        $conn = null;


      }

        ?>

	</form>
  </div>

</body>
