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

<title>Supprimer</title>
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
    <h1 class="card-title">Supprimer un Produit</h1>
  </div>
</div>
<div class="container " style="margin:1% 0% 1% 35%;">
<form method='post'  action=''>
    <input type='text' style="width:30%;" name='produit' placeholder='Entrer votre produit' id='nom' class="form-control" required>
    <input type='submit' value='supprimer' id='rechercher' name="supprimer" style="margin:1% 0% 0% 10%;">
    <form>
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
$newline="";
$existpas=false;
if(isset($_POST['supprimer'])){
    if(!empty ($_POST['produit'])){
        $fich=fopen('produits.txt' , 'r');
        $supp=$_POST['produit'];
    while(!feof($fich)){
        $fic=fgets($fich);
        $ingre=explode(',' , $fic);
        if(!strcasecmp($supp,$ingre[0])){
            $suppri="";
        }
        else{
            $existpas=true;
            $suppri=$fic;
           
        }
        $newline=$newline.$suppri;
    }
    fclose($fich);
    
    $fich=fopen('produits.txt','w+');
    fwrite($fich,$newline);
    fclose($fich);
    }
    if($existpas==true){
        echo "<h4 style='color:red;text-align:center'>Le produit n'existe pas<h4>" ;
    }
}
$fichier1=fopen('produits.txt', 'r');
          while(!feof($fichier1)){
            $ligne =trim(fgets($fichier1));
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
          fclose($fichier1);
    
 
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