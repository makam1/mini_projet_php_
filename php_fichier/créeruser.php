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

<title>Ajouter utilisateurs</title>
</head>
<body >
<div class="card text-center">
  <div class="card-header">

   <ul class="nav nav-tabs card-header-tabs">
      
      <li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="acceuil.php">Acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="lister.php">Liste</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rechercher.php">Rechercher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ajouterProduit.php">Ajouter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="modifier.php">Modifier</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="supprimer.php">Supprimer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="créeruser.php">Ajouter utilisateur</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listerusers.php">Liste des utilisateurs</a>
      </li>
    </ul>
    
  </div>
  <div class="card-body">
    <h1 class="card-title">Ajouter un utilisateur</h1>
  </div>
</div>
  <h1 style="margin-top:5%;">Saisissez les informations de l'utilisateur</h1>
  <div class="container-fluid " style="width:30%">
<form class="form-signin" method="post" action="">
  <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">		
      <input  type="text" name="nom" placeholder="Entrer le nom du l'utilisateur" class="form-control" required/><br>
      <input  type="text" name="login" placeholder="Entrer le login" class="form-control" required /><br>
      <input type="number" name="tel" placeholder="Entrer le Téléphone" class="form-control" required/><br>
      <input type="text" name="email" placeholder="Entrer l'adresse mail" class="form-control" required/><br>
      <input type="text" name="adresse" placeholder="Entrer l'adresse" class="form-control" required/><br>
      <div class="container-fluid">
      <p>Veuillez choisir le profil de l'utilisateur :</p>
      <div class="row">
      <div class="col-md-6"> <input type="radio" id="admin" name="profil" value="admin"  class="form-control" required>
    <label for="admin">Admin</label></div>
    <div class="col-md-6"><input type="radio" id="user" name="profil" value="user"  class="form-control" required>
    <label for="user">User</label></div><br><br>
    </div></div>
      <input type='submit' name="ajouter" value='Ajouter' id='' class=""><br><br>
</form>
</div>
<?php
 $exist=false;
 $fichier = fopen('users.txt', 'a+');

  if(isset($_POST['ajouter'])) {
    $nom=$_POST['nom'];
    $login=$_POST['login'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $adresse=$_POST['adresse'];
    $profil=$_POST['profil'];
   while(!feof($fichier)){
      $ligne=trim(fgets($fichier));
      $tab=explode(",",$ligne);
      if($login==$tab[1]){
        $exist=true;   
        }
} 
if($exist==true)
{ 
echo "<h4 style='color:red;text-align:center'>Ce login existe déja, Essayer avec un autre<h4>" ;
}else    
{ 
  fputs($fichier,"\n".$nom.",".$login.",passer123,".$tel.",".$email.",".$adresse.",".$profil.","."actif"); 
        
  }

  }

fclose($fichier);
if($_SESSION['profil']!="admin"){
  header('Location: acceuil.php');
}
?>
<div class="container-fluid pied" >
        <footer >
                <div class="copyright" style="">
                <p class="droits" style="background: #27475d;">Copyright © 2019 All Rights Reserved |
                 This website is made by <span class="icehearth"> <i class="fas fa-heart"></i></span><span><a href="MAYA">YAMA</a></span> </p></div>  
        </footer>
    </div> 
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>