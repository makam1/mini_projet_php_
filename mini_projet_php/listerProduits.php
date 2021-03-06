
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">      
   <title>Nos Produits</title>
</head>
<body>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
       
      <li class="nav-item">
        <a class="nav-link" href="authentification.php">Authentification</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="acceuil.php">Acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="listerProduits.php">Liste</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rechercherProduits.php">Rechercher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ajouterProduit.php">Ajouter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="updateProduit.php">Update</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="supprimer.php">Supprimer</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">BIENVENUE</h5>
    <p class="card-text">à Sonatel Market</p>
    
  </div>
</div>


<strong><h1 align="center">Nos Produits</h1></strong>
<?php
    $ingredient = array(
                            array("produits" => 'Sel',"prix" => '50' , "quantites" => '2', "montant" => ''),
                            array("produits" => 'poivre',"prix" => '200' , "quantites" => '10', "montant" => ''),
                            array("produits" => 'pument',"prix" => '75' , "quantites" => '5', "montant" => ''),
                            array("produits" => 'ail',"prix" => '300' , "quantites" => '15', "montant" => ''),
                            array("produits" => 'ognon',"prix" => '350' , "quantites" => '25', "montant" => ''),
                            array("produits" => 'poivron',"prix" => '100' , "quantites" => '20', "montant" => ''),
                            array("produits" => 'carotte',"prix" => '150' , "quantites" => '30', "montant" => ''),
                            array("produits" => 'navet',"prix" => '250' , "quantites" => '7', "montant" => ''),
                            array("produits" => 'haricot',"prix" => '400' , "quantites" => '40', "montant" => ''),
                            array("produits" => 'obergine',"prix" => '700' , "quantites" => '9', "montant" => ''),
    );
?>
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


        for($i=0;$i<count($ingredient);$i++){
          $taille=$ingredient[$i];
          if($taille["quantites"]<10){
          echo"<tr>
          <td class='bg-danger'>".$taille["produits"]."</td>
          <td class='bg-danger'>".$taille["prix"]."</td>
          <td class='bg-danger'>".$taille["quantites"]."</td>
          <td class='bg-danger'>".$taille["prix"]*$taille["quantites"]."</td>
          </tr>
          ";
          }else{
          echo"<tr>
          <td>".$taille["produits"]."</td>
          <td>".$taille["prix"]."</td>
          <td>".$taille["quantites"]."</td>
          <td>".$taille["prix"]*$taille["quantites"]."</td>
          </tr>
          ";
          
          }
          
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