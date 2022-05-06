<?php
session_start();

?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="successlogin.css">
  <title>Internerbereich</title>
</head>
<body>
<div class="title">Internerbereich</div>

  <div class="login-wrapper">

    <form action="" class="form" method="post">
      <img src="avatar.png" alt="">
      <h2>User</h2>
      <?php echo "ID: " .$_SESSION['userid']; ?>
      <br><br>
      <?php echo "Name: " .$_SESSION['name']; ?>
      <div class="logout">
      <a href="logout.php" class="logoutbutton"> Logout </a>
      </div>
    </form>

  </div>
</body>
</html>
