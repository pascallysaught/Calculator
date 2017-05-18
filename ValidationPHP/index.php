<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/Script.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        
    <?php
    
$nomErr = $passErr = $confPassErr = $emailErr = "";
$nom = $pass = $confPass = $email ="";
$messageSucces = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) {
    $nomErr = "Le nom est requis";
    $isValid = false;
  } else {
    $nom = test_input($_POST["nom"]);    
    if (!preg_match("/^[A-Za-z][0-9]{4}$/",$nom)) {
      $nomErr = "Entrez le bon format pour le nom";
    $isValid = false;  
    }
  }

  if (empty($_POST["pass"])) {
    $passErr = "Le mot de passe est requis";
    $isValid = false;
  } else {
    $pass = test_input($_POST["pass"]); 
    if (!preg_match("/^EXAMEN|examen$/",$pass)) {
      $passErr = "Entrez le bon format pour le mot de passe";
      $isValid = false; 
    }
  }

  if (empty($_POST["confPass"])) {
    $passErr = "La confirmation du mot de passe est requise";
    $isValid = false;
  } else {
    $confPass = test_input($_POST["confPass"]);
    if ($pass !== $confPass) {
      $passErr = "Les mots de passe de concordent pas";
      $isValid = false; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Le e-mail est requis";
    $isValid = false;
  } else {
    $email = test_input($_POST["email"]);
    
    if (!preg_match("/^[0-9][a-zA-Z]+@[a-zA-Z]+[.](com|org|ca|edu)$/",$email)) {
      $emailErr = "Entrez le bon format pour le e-mail";
      $isValid = false; 
    }
  }

  if($isValid == true)
    {
      $messageSucces = "Connexion résussie";
    }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>    
    
    <div class="container jumbotron" id="header" >
      <div>
        <h1 class=" id="header"> Connectez-vous</h1>
      </div>
    <form id="monFormulaire" name="monFormulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  <div class="form-group">
    <label for="nom">Nom d'utilisateur</label>
    <input type="text" class="form-control" id="nom" name="nom" >
    <span class="error"><?php echo $nomErr;?></span>
  </div>  
  <div class="form-group">
    <label for="pass">Mot de passe:</label>
    <input type="password" class="form-control" id="pass" name="pass">
    <span class="error"><?php echo $passErr;?></span>
  </div>
   <div class="form-group">
    <label for="confPass">Confirmez le mot de passe:</label>
    <input type="password" class="form-control" id="confPass" name="confPass">
    <span class="error"><?php echo $passErr;?></span>
    
  </div>  
  <div class="form-group">
    <label for="email"> Adresse mail :</label>
    <input type="email" class="form-control" id="email" name="email">
   <span class="error"><?php echo $emailErr;?></span> 
  </div>  
   <div id="message">
    </div>
  <input type="button" class="btn btn-default" value="Envoyer " onclick="validerDonne()"/>
</form>
      <div id="messageSucces">
        <span><?php echo $messageSucces;?></span>
    </div>
       </div>
    </body>
</html>
