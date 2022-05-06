<?php
session_start();

	
	  require('login.html');
	  
		if(isset($_POST['loginEmail'],$_POST['loginPassword'])){
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        if($email == null || $password == null) return;

    #  $hash1 = password_hash($password,PASSWORD_DEFAULT);

    require("config.inc.php");
    $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();  // Daten werden geholt als array

    $hash_db=$user["passwort"];

    //Überprüfung des Passworts und des Users
    if ($user!==false && password_verify($password, $hash_db)) {

		$_SESSION['userid'] = $user['id'];
		$_SESSION['name'] = $user['name'];
      header('Location: Erfolgreich.php');
        die('<h3 class="title"> Login erfolgreich...</h3>');

    }
     {
        $errorMessage = '<div class="error">Email oder Passwort waren ungültig</div><br>';
    }

     echo $errorMessage;

		}
      ?>

			<!DOCTYPE html>

			<div id="registrierungSeite" style="display:none;">
			<?php require('registrierung.php') ?>
				</div>

	<script>
			
$(document).ready(function(){
  $("button").on("click touchstart", function(event)
  {
	  event.preventDefault();
    $("#hidelogin").hide();
	$("#hidelogin").load("registrierung.php");
	$("#hidelogin").fadeIn(2000);
  });
});

</script>
