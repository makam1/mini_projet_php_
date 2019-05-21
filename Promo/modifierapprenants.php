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

        <title>Modifier Apprenants</title>
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
            <h2 class="card-title">Modifier les informations d'un apprenant</h2>
        </div >
        <div class="container">
        <div class="row">
        <div class="col-md-6">
        <form class="form-signin" method="post" action="">
            <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">		
            <input class="form-control" type="text" name="name" placeholder="Entrer le prénom de l'apprenant"/><br>
            <input type='submit' name="rechercher" value='Rechercher'  id="con"><br><br>

        </form>
        </div>
        <div class="col-md-6">
        <form class="form-signin" method="post" action="">
            <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">		
            <input class="form-control" type="number" name="numcode" placeholder="Entrer le code de l'apprenant"/><br>
            <input type='submit' name="code" value='Recherche'  id="con"><br><br>

        </form>
        </div>
        </div>
        </div>
       
        <div class="container">
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
            $bloc='';
            $bloc1='';
            $exist=false;
            $test =false;
            $prom='';
            //Rechercher l'apprenant par le prénom
            if(isset($_POST['rechercher'])){
                $promos=fopen('apprenants.txt', 'r');
                    while(!feof($promos)){
                        $ligne =fgets($promos);
                        $tab=explode(",",$ligne);
                        if(!strcasecmp($_POST['name'],$tab[2])&& $tab[7]!="exclu"){
                            $exist=true;
                        }
                    }
                    fclose($promos);
                    if($exist==true){
                        $promos=fopen('apprenants.txt', 'r');
                        while(!feof($promos)){
                            $ligne =fgets($promos);
                            $tab=explode(",",$ligne);
                            echo "<tr>";
                            for($i=0;$i<count($tab);$i++){
                                if(!strcasecmp($_POST['name'],$tab[2]) && $tab[7]!="exclu"){
                            echo "<td>".$tab[$i]."</td>";
                            }
                        } 
                        echo "</tr ";   
                    } 
                     fclose($promos);

                }
                else{
                    echo "<h4 style='color:red;text-align:center'>L'apprenant n'existe pas dans nos fichiers <h4>" ;
                }
                echo "</table>
                <div class='container'>
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
                </thead>";
                }
            //Envoyer le code de l'apprenant et lui renvoyer les informations de ce dernier
            if(isset($_POST['code'])){
                $code=$_POST['numcode'];
                $promos=fopen('apprenants.txt', 'r');
                while(!feof($promos)){
                  $ligne =fgets($promos);
                  $tab=explode(",",$ligne);
                  if($code==$tab[0]){ 
                      ?>
                     <div class="container">
                        <div class="row">
                        <div class="col-md-6">
                        <form class="form-signin" method="post" action="">
                        <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">		
                        <input class="form-control" type="number" name="code1" value="<?php echo $tab[0];?>" readonly/><br>
                        <input class="form-control" type="text" name="nom" value="<?php echo $tab[1]; ?>"/><br>
                        <input class="form-control" type="text" name="prenom" value="<?php echo $tab[2]; ?>"/><br>
                        <input class="form-control" type="date" name="datenaissance" value="<?php echo $tab[3]; ?>"/><br>
                        <input class="form-control" type="number" name="tel" value="<?php echo $tab[4]; ?>"/><br>
                        <input class="form-control" type="mail" name="mail" value="<?php echo $tab[5]; ?>"/><br>
                        <select name="promo" id="">
                        <?php
                                $promos1=fopen('promos.txt','r');
                                while(!feof($promos1)){
                                    $ligne=fgets($promos1);
                                    $tab=explode(",",$ligne);
                                    for($i=0;$i<count($tab);$i++){
                                        if($i==1)
                                    echo "<option value='$tab[1]'>".$tab[1]."</option>";
                                }
                            }
                                fclose($promos1);

                        ?>
                        </select>
                        <input type='submit' name="modifier" value='Modifier' id='con' class=""><br><br>

                    </form>
                    </div>
                    <div class="col-md-6">
                    <img src="1.png" class="" alt="...">
                    </div>
                    </div>
                    </div>
                      <?php
                  }  
                }
                  fclose($promos);

            }
            //Modifier les informations de l'apprenant
            if(isset($_POST['modifier'])){
                $code1=$_POST['code1'];
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $date=$_POST['datenaissance'];
                $tel=$_POST['tel'];
                $mail=$_POST['mail'];
                $promo=$_POST['promo'];
                $promos=fopen('apprenants.txt','r');
                while(!feof($promos)){
                    $ligne=fgets($promos);
                    $tab=explode(",",$ligne);
                    if($code1==$tab[0]){ 
                        if($promo!=$tab[6]){
                          $test=true; 
                          $prom=$tab[6]; 
                        }
                        $new=$tab[0].','.$nom.','.$prenom.','.$date.','.$tel.','.$mail.','.$promo.','.$tab[7].','."\n";
                    }else{
                        $new=$ligne;
                    }
                    $bloc=$bloc.$new;
                }
                fclose($promos);
                $promos=fopen('apprenants.txt','w+');
                fputs($promos,$bloc);
                fclose($promos);
                $promos=fopen('apprenants.txt','r');
                while(!feof($promos)){
                    $ligne =fgets($promos);
                    $tab=explode(",",$ligne);
                    echo "<tr>";
                    if($tab[7]!="exclu"){
                      for($i=0;$i<count($tab);$i++){
                        echo "<td>".$tab[$i]."</td>";
                    }
                      } 
                  echo "</tr>";   
                  }  
                fclose($promos);
                //Actualiser le nombre d'apprenants au niveau du fichier des promos
                if($test==true){
                $promos1=fopen('promos.txt','r');
                while(!feof($promos1)){
                    $ligne=fgets($promos1);
                    $tab=explode(",",$ligne);
                    if($promo==$tab[1]) {
                        $tab[4]=$tab[4]+1;
                        $new=$tab[0].','.$tab[1].','.$tab[2].','.$tab[3].','.$tab[4].','."\n";
                    }else{
                        if($prom==$tab[1]){
                            $tab[4]=$tab[4]-1;
                        $new=$tab[0].','.$tab[1].','.$tab[2].','.$tab[3].','.$tab[4].','."\n";
                        }        
                        else{
                        $new=$ligne;
                        }
                    }
                    $bloc1=$bloc1.$new;
                }
                fclose($promos1);
                $promos1=fopen('promos.txt','w+');
                fputs($promos1,trim($bloc1));
                fclose($promos1);  
                }

            }
           else{
                $promos=fopen('apprenants.txt', 'r');
                        while(!feof($promos)){
                          $ligne =fgets($promos);
                          $tab=explode(",",$ligne);
                          echo "<tr>";
                          if($tab[7]!="exclu"){
                            for($i=0;$i<count($tab);$i++){
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
          <footer class="copyright" >
                  <div >
                  <p class="droits">Copyright © 2019 All Rights Reserved |
                    This website is made by <span class="icehearth"> <i class="fas fa-heart"></i></span><span><a href="MAK">MAK</a></span> </p></div>  
          </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>