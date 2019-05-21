<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<title>Connexion</title>
</head>
<body class="authentification">
<div class="card text-center">

  <div class="card-header">
  </div>
  </div>
    <div class="container auth ">
    <form class="" method="post" action="">
  <h1 class="connect">Authentifiez-vous</h1><br>
  <input type="login" name='user' id="inputlogin" class="form-control" placeholder="login" required><br>
  <input type="password" name='pswd' id="inputPassword" class="form-control" placeholder="Password" required><br><br>
  <input type='submit' name='connecter' value='connecter' id='con' ><br><br>
  <p class="mt-5 mb-3 text-muted" style="text-align:center">&copy; 2018-2019</p>

</form>
</div>
        <?php 
        $ver =0;
$monfichier = fopen('users.txt', 'r');
if(isset ($_POST['connecter'])){
$login=$_POST['user'];
$mdp=$_POST['pswd'];
$_SESSION['login']=$login;
while(!feof($monfichier)){
$ligne =trim(fgets($monfichier));
$tab=explode(",",$ligne);

if($login==$tab[1] and $mdp==$tab[2])
{
    $ver =  $ver+1;
    $profil=$tab[6];
    $statut=$tab[7];
    $passwd=$tab[2];
    $_SESSION['profil']=$profil;
}
}
if($ver!=0){
    if($profil=="admin" && $passwd!="passer123"){
        if($statut=="actif"){
            header('Location: accueil.html');
        }else{
                    echo "Vous n'avez pas accés au site, contacter l'administrateur";
                }
        }else{
            if($statut=="actif"){
                header('Location: accueil.html');
            }
            if($passwd=='passer123' && $statut=="actif"){
                header('Location: changepassword.php');
            }
                else{
                    echo "<h4 style='color:red;text-align:center'>Vous n'avez pas accés au site, contacter l'administrateur <h4>";
                }

            }
        }
else{
    echo "<h4 style='color:red;text-align:center'>Login ou mot de passe incorrect<h4>";
}
} 

fclose($monfichier);
?>    

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>