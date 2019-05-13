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

<title>Liste utilisateurs</title>
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
    <h1 class="card-title">Liste des utilisateurs</h1>
  </div>
</div>
    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Login</th>
      <th scope="col">Mot de passe</th>
      <th scope="col">Téléphone</th>
      <th scope="col">E-mail</th>
      <th scope="col">Adresse</th>
      <th scope="col">Profil</th>
      <th scope="col">Statut</th>
    </tr>
  </thead>
  <tbody>
     <?php 
     $ver=0;
      $monfichier = fopen('users.txt', 'r');
      while(!feof($monfichier)){
      $ligne =trim(fgets($monfichier));
      $tab=explode(",",$ligne);
      echo "<tr>";
      for($i=0;$i<count($tab)-1;$i++){
          if($i==2){
              echo "<td>   ***********</td>";
          }else{
          echo "<td>".$tab[$i]."</td>";
        }
        }
          if($i==7 and $tab[1]!="MmeSow"){
            if($tab[7]=="actif")
              echo " <td><a href='bloquer.php?login=$tab[1]'><button class='btn btn-success'>".$tab[7]."</button>
          </a></td>";
          else echo " <td><a href='bloquer.php?login=$tab[1]'><button class='btn btn-danger'>".$tab[7]."</button>
          </a></td>";
            }else{
              echo " <td><a href=''><button class='btn btn-success'>".$tab[7]."</button>
          </a></td>";
            }
      }
            echo "</tr>";
fclose($monfichier);
if($_SESSION['profil']!="admin"){
  header('Location: acceuil.php');
}
?>    
</table>

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