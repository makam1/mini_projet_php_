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

        <title>Ajouter Promo</title>
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
            <h1 class="card-title" >Ajouter Une Promotion</h3>
        </div >
        <div class="container">
        <div class="row">
        <div class="col-md-4">
        <img src="1.png" class="" alt="...">
        </div>
        <div class="col-md-8">
            <form class="form-signin" method="post" action="">
                <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">            
                <input class="form-control" type="text" name="nompromo" placeholder="Entrer le nom de la promo" required/><br>
                <select class="form-control" name="mois" required>
                    <option value="Janvier">Janvier</option>
                    <option value="Fevrier">Fevrier</option>
                    <option value="Mars">Mars</option>
                    <option value="Avril">Avril</option>
                    <option value="Mai">Mai</option>
                    <option value="Juin">Juin</option>
                    <option value="Juilliet">Juilliet</option>
                    <option value="Aout">Aout</option>
                    <option value="Septembre">Septembre</option>
                    <option value="Octobre">Octobre</option>
                    <option value="Novembre">Novembre</option>
                    <option value="Decembre">Decembre</option>
                </select><br>
                <input class="form-control" type="number" name="annee" placeholder="Entrer l'année" required/><br>
                <input type='submit' name="ajouter" value='Ajouter' id="con"><br><br>

            </form>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <table class='table table-dark'>
                <thead>
                    <tr classe='table'>
                        <th scope='col' classe='table'>Code de la promo</th>
                        <th scope='col' classe='table'>Nom de la promo</th>
                        <th scope='col' classe='table'>Mois</th>
                        <th scope='col' classe='table'>Année</th>
                        <th scope='col' classe='table'>Nombre d'apprenants</th>
                    </tr>
                </thead>
        <?php
            if(isset($_POST['ajouter'])){
                $nompromo=$_POST['nompromo'];
                $mois=$_POST['mois'];
                $année=$_POST['annee'];
                $code=1;
                $exist=false;
                $promos=fopen('promos.txt','r');
                while(!feof($promos)){
                    $ligne=fgets($promos);
                    $tab=explode(",",$ligne);
                    if(!strcasecmp($nompromo,$tab[1])){
                        $exist=true;
                    }
                    $code=$code+1;
                }
                fclose($promos);
                $promos= fopen('promos.txt', 'r');
                if($exist==true){
                    echo "<h4 style='color:red;text-align:center'>La Promo existe déja <h4>" ;
                    while(!feof($promos)){
                        $ligne =fgets($promos);
                        $tab=explode(",",$ligne);
                        echo "<tr>";
                        if(!strcasecmp($nompromo,$tab[1])){
                            for($i=0;$i<count($tab);$i++){
                            echo "<td  class='bg-danger'>".$tab[$i]."</td>";
                        }
                        }else{
                            for($i=0;$i<count($tab);$i++){
                            echo "<td>".$tab[$i]."</td>";
                            }
                        } 
                        echo "</tr>";
                        }
                    fclose($promos);
                }else{
                    $promos= fopen('promos.txt', 'a+');
                    $ajout=$code.','.$nompromo.','.$mois.','.$année.','.'0'.',';
                    fputs($promos,"\n".$ajout);
                    fseek($promos,0); 
                    while(!feof($promos)){
                        $ligne =fgets($promos);
                        $tab=explode(",",$ligne);
                        echo "<tr table-primary>";
                        for($i=0;$i<count($tab);$i++){
                            echo "<td>".$tab[$i]."</td>";
                        }
                    }
                    fclose($promos);
                }
                            
            }
            else{
                $promos=fopen('promos.txt', 'r');
                        while(!feof($promos)){
                          $ligne =fgets($promos);
                          $tab=explode(",",$ligne);
                          echo "<tr table-primary>";
                            for($i=0;$i<count($tab);$i++){
                              echo "<td>".$tab[$i]."</td>";
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
          <footer class="copyright">
                  <div >
                  <p class="droits">Copyright © 2019 All Rights Reserved |
                    This website is made by <span class="icehearth"> <i class="fas fa-heart"></i></span><span><a href="MAK">MAK</a></span> </p></div>  
          </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>