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

<title>Ajouter produits</title>
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
    <h1 class="card-title">Ajouter un produit</h1>
  </div>
</div>
<div class="container">
<form class="form-signin" method="post" action="">
  <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
				
    <input class="formrecherche" type="text" name="nom" placeholder="Entrer le nom du produit"/>
      <input class="formrecherche" type="number" name="prix_unitaire" placeholder="Entrer le prix du produit"/>
      <input class="formrecherche" type="number" name="quantite" placeholder="Entrer la quantité du produit"/>
      <input type='submit' name="ajouter" value='Ajouter' id='rechercher' class="formrecherche"><br><br>

</form>
</div>
<table class='table table-striped table-dark'>
  <thead>
    <tr classe='table'>
      <th scope='col' classe='table'>produits</th>
      <th scope='col' classe='table'>prix</th>
      <th scope='col' classe='table'>quantites</th>
      <th scope='col' classe='table'>montant</th>
    </tr>
  </thead>
  
<?php
 $nom="nom";
 $prixsaisi=0;
 $quantitesaisi=0;
 $exist=false;

  if(isset($_POST['ajouter'])) {
  
    $fichier = fopen('produits.txt', 'r');
    $nom=$_POST['nom'];
    $prixsaisi=$_POST['prix_unitaire'];
    $quantitesaisi=$_POST['quantite'];
    while(!feof($fichier)){
      $ligne=trim(fgets($fichier));
      $tab=explode(",",$ligne);
      if(!strcasecmp($nom,$tab[0])){
        $exist=true;   
        }
} 
fclose($fichier);
$fichier= fopen('produits.txt', 'r+');

if($exist==true)
{ 
echo "<h4 style='color:red;text-align:center'>Le produit existe déja <h4>" ;
      while(!feof($fichier)){
        $ligne =trim(fgets($fichier));
        $tab=explode(",",$ligne);
        echo "<tr>";
        if(!strcasecmp($nom,$tab[0])){
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
      fclose($fichier);
      
    }  
else
{ 
  $fichier1=fopen('produits.txt', 'a+');
  fputs($fichier1,"\n".$nom.",".$prixsaisi.",".$quantitesaisi);
  fseek($fichier1,0); 
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
  }
}else{
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