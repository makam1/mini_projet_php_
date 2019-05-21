<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Liste Apprenants</title>
    </head>
    <body >
    <div class="card text-center menu">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="accueil.html">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ajouterapprenants.php">Ajouter Apprenants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ajouterpromo.php">Ajouter Promos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modifierapprenants.php">Modifier Apprenants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modifierpromos.php">Modifier Promos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listerapprenants.php">Liste des Apprenants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listerpromos.php">Liste des Promos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exclure.php">Exclure Apprenants</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <h1 class="card-title">Liste des Apprenants</h3>
        </div >
        <div class="container">
        <form class="form-signin" method="post" action="">
            <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">		
            <select name="promo" id="" class="form-control">
                        <?php
                                $promos=fopen('promos.txt','r');
                                while(!feof($promos)){
                                    $ligne=fgets($promos);
                                    $tab=explode(",",$ligne);
                                    for($i=0;$i<count($tab);$i++){
                                        if($i==1)
                                    echo "<option value='$tab[1]'>".$tab[1]."</option>";
                                }
                            }
                                fclose($promos);

                        ?>
                        </select><br>
            <input type='submit' name="rechercher" value='rechercher'  id="con"><br><br>

        </form>
        </div>       
        <div class="container-fluid">
       
        <div class="row">
        <div class="col-md-12"> 
        <table class='table table-striped table-dark table-responsive'>
                <thead>
                    <tr classe='table'>
                        <th scope='col' classe='table'>Code de l'apprenant</th>
                        <th scope='col' classe='table'>Nom</th>
                        <th scope='col' classe='table'>Prénom</th>
                        <th scope='col' classe='table'>Date de naissance</th>
                        <th scope='col' classe='table'>Téléphone</th>
                        <th scope='col' classe='table'>E-mail</th>
                        <th scope='col' classe='table'>Promo de l'apprenant</th>
                        <th scope='col' classe='table'>Statut</th>
                    </tr>
                </thead>
                <?php
                    if(isset($_POST['rechercher'])){
                        echo " <div class='row'>
                        <div class='col-md-12'>
                        <img src='1.png' class='log'>
                        </div>
                        </div>";
                        $promo=$_POST['promo'];
                        $promos=fopen('apprenants.txt', 'r');
                        while(!feof($promos)){
                            $ligne =fgets($promos);
                            $tab=explode(",",$ligne);
                            echo "<tr>";
                            for($i=0;$i<count($tab);$i++){
                                if($promo==$tab[6] && $tab[7]!="exclu"){
                              echo "<td>".$tab[$i]."</td>";
                            }
                            } 
                        echo "</tr>";  
                        }
                    }else{
                    $promos=fopen('apprenants.txt', 'r');
                        while(!feof($promos)){
                          $ligne =fgets($promos);
                          $tab=explode(",",$ligne);
                          echo "<tr>";
                            for($i=0;$i<count($tab);$i++){
                                if( $tab[7]!="exclu"){
                              echo "<td>".$tab[$i]."</td>";
                            }
                            } 
                        echo "</tr>";   
                        }  
                        fclose($promos);
                    }
                        ?>
        </table>
    </div>
    </div>
    </div>
    </div>

          <footer class="copyright">
                  <div  >
                  <p class="droits">Copyright © 2019 All Rights Reserved |
                    This website is made by <span class="icehearth"> <i class="fas fa-heart"></i></span><span><a href="MAK">MAK</a></span> </p></div>  
          </footer>
     
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>