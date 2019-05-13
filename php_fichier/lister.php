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

<title>Liste Produits</title>
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
    <h1 class="card-title">Liste des produits</h1>
  </div>
</div>
    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">produits</th>
      <th scope="col">prix</th>
      <th scope="col">quantites</th>
      <th scope="col">montant</th>
    </tr>
  </thead>
  <tbody>
     <?php 
$monfichier = fopen('produits.txt', 'r');
          while(!feof($monfichier)){
            $ligne =trim(fgets($monfichier));
            $tab=explode(",",$ligne);
            echo "<tr>";
            if($tab[2]<10){
             for($i=0;$i<count($tab);$i++){
                echo "<td  class='bg-danger'>".$tab[$i]."</td>";
            }
            echo "<td class='bg-danger'>".$tab[1]*$tab[2]."</td>";
              }else{
                for($i=0;$i<count($tab);$i++){
                  echo "<td>".$tab[$i]."</td>";
              }
              echo "<td>".$tab[1]*$tab[2]."</td>";
              } 
          echo "</tr>";   
          }  
fclose($monfichier);
?>    
</table>
    </body>
</html>