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

<title>Rechercher</title>
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
    <h1 class="card-title">Rechercher ici</h1>
  </div>
</div>
<div class="container">
<form class="form-signin" method="post" action="">
  <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
				
    <input class="formrecherche" type="number" name="prixmin" placeholder="Entrer le prix minimum"/>
      <input class="formrecherche" type="number" name="prixmax" placeholder="Entrer le prix maximum"/>
      <input class="formrecherche" type="number" name="quantite" placeholder="Entrer quantité"/>
      <input type='submit' value='Rechercher' id='rechercher' name="rechercher" class="formrecherche"><br><br>

</form>
</div>
<table class="table table-striped table-dark">
  <thead>
    <tr classe="table">
      <th scope="col" classe="table">produits</th>
      <th scope="col" classe="table">prix</th>
      <th scope="col" classe="table">quantites</th>
      <th scope="col" classe="table">montant</th>
    </tr>
  </thead>
  <tbody>
<?php
  $fichier=fopen('produits.txt','r');       
  if (isset($_POST['rechercher'])) {
    $prixmin=$_POST['prixmin'];
    $prixmax=$_POST['prixmax'];
    $quantite=$_POST['quantite'];
    while(!feof($fichier)){
    $ligne =trim(fgets($fichier));
    $tab=explode(",",$ligne);
    if ((!empty ($_POST['quantite'])) and (empty ($_POST['prixmin'])) and (empty ($_POST['prixmax']))){
      if($quantite<=$tab[2]) 
      {
       echo '<tr>';
  
       if($tab[2]<=10) 
 {
   for($i=0; $i<count( $tab); $i++)
  {
    echo '<td class="bg-danger">' .$tab[$i]. '</td>';
   }
   echo '<td class="bg-danger">'.$tab[1]*$tab[2].'</td>';
         }else
         {
          for($i=0; $i<count( $tab); $i++)
              {
                echo '<td>' .$tab[$i]. '</td>';
              }
              echo '<td>'.$tab[1]*$tab[2].'</td>';
                    }
                  echo "</tr>";
      }
   }
   else if ((!empty ($_POST['prixmin'])) and (empty ($_POST['quantite'])) and (empty ($_POST['prixmax']))){
       if($prixmin<$tab[1]){
       echo '<tr>';
       if($tab[2]<=10) 
 {
   for($i=0; $i<count( $tab); $i++)
  {
    echo '<td class="bg-danger">' .$tab[$i]. '</td>';
   }
   echo '<td class="bg-danger">'.$tab[1]*$tab[2].'</td>';
         }else
         {
          for($i=0; $i<count( $tab); $i++)
          {
            echo '<td>' .$tab[$i]. '</td>';
          }
          echo '<td>'.$tab[1]*$tab[2].'</td>';
                }
              echo "</tr>";
      }
   }
   else if ((!empty ($_POST['prixmax'])) and (empty ($_POST['prixmin'])) and (empty ($_POST['quantite']))){

      if($prixmax>$tab[1]){
       echo '<tr>';
       if($tab[2]<=10) 
 {
   for($i=0; $i<count( $tab); $i++)
  {
    echo '<td class="bg-danger">' .$tab[$i]. '</td>';
   }
   echo '<td class="bg-danger">'.$tab[1]*$tab[2].'</td>';
         }else
         {
          for($i=0; $i<count( $tab); $i++)
              {
                echo '<td>' .$tab[$i]. '</td>';
              }
              echo '<td>'.$tab[1]*$tab[2].'</td>';
                    }
                  echo "</tr>";
      }
   }
   else if( (!empty ($_POST['prixmin'])) and (!empty ($_POST['prixmax'])) and (empty ($_POST['quantite']))){
       if($prixmin<$prixmax){
           if($prixmin<$tab[1] && $prixmax>$tab[1]){
          
               echo '<tr>';
               if($prixmax>$tab[1]){
                 echo '<tr>';
                 if($tab[2]<=10) 
           {
             for($i=0; $i<count( $tab); $i++)
            {
              echo '<td class="bg-danger">' .$tab[$i]. '</td>';
             }
             echo '<td class="bg-danger">'.$tab[1]*$tab[2].'</td>';

                   }else
                 {
                  for($i=0; $i<count( $tab); $i++)
                  {
                    echo '<td>' .$tab[$i]. '</td>';
                  }
                  echo '<td>'.$tab[1]*$tab[2].'</td>';
                        }
                      echo "</tr>";
              }
       }
         
   }
 }
   
else if( (!empty ($_POST['quantite'])) and (!empty ($_POST['prixmin'])) and (!empty ($_POST['prixmax']))){
      
   if ($quantite<=$tab[2] && ( $prixmin<$tab[1] && $prixmax>$tab[1])){
      echo '<tr>';
      if($tab[2]<=10) 
           {
             for($i=0; $i<count( $tab); $i++)
            {
              echo '<td class="bg-danger">' .$tab[$i]. '</td>';
             }
             echo '<td class="bg-danger">'.$tab[1]*$tab[2].'</td>';

                   }else
     {
      for($i=0; $i<count( $tab); $i++)
      {
        echo '<td>' .$tab[$i]. '</td>';
      }
      echo '<td>'.$tab[1]*$tab[2].'</td>';
            }
          echo "</tr>";

      }
   }
  
}
       
}             
else{      
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