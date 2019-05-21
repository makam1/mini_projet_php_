<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Ajouter Apprenant</title>
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
            <h1 class="card-title">Saisissez les informations de l'apprenant</h1>
        </div >
        <div class="container-fluid " style="width:90%">
            <div class="row">
            <div class="col-md-4">
            <img src="1.png" class="" alt="...">
            </div>
            <div class="col-md-8">
            <form class="form-signin" method="post" action="">
                <input class="form-control" type="text" name="nom" placeholder="Entrer le nom de l'apprenant" required/><br>
                <input class="form-control" type="text" name="prenom" placeholder="Entrer le prénom de l'apprenant" required/><br>
                <input class="form-control" type="date" name="datenaissance" placeholder="Entrer la date de naissance" required/><br>
                <input class="form-control" type="number" name="tel" placeholder="Entrer le numéro de téléphone" required/><br>
                <input class="form-control" type="mail" name="mail" placeholder="Entrer l'adresse mail" required/><br>
                <select name="promo" class="form-control">
                <?php
                     $promos=fopen('promos.txt','r');
                     while(!feof($promos)){
                         $ligne=fgets($promos);
                         $tab=explode(",",$ligne);
                         for($i=0;$i<count($tab);$i++){
                             if($i==1)
                            echo "<option value='$tab[1]' required>".$tab[1]."</option>";
                        }
                    }
                      fclose($promos);

                ?>
                </select><br><br>
                <input type='submit' name="ajouter" value='Ajouter' id='con' ><br><br>
            </form>
        </div>
        </div>
        </div>
        <?php
            if(isset($_POST['ajouter'])){
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $date=$_POST['datenaissance'];
                $tel=$_POST['tel'];
                $mail=$_POST['mail'];
                $promo=$_POST['promo'];
                $code=1;
                $nbre=0;
                $bloc='';
                $promos=fopen('apprenants.txt','a+');
                fseek($promos,0);
                while(!feof($promos)){
                    $ligne=fgets($promos);
                    $code=$code+1;
                }
                
                $ajout=$code.','.$nom.','.$prenom.','.$date.','.$tel.','.$mail.','.$promo.','.'actif'.',';
                fputs($promos,"\n".$ajout);
                fclose($promos); 

                $promos=fopen('promos.txt','r');
                while(!feof($promos)){
                    $ligne=fgets($promos);
                    $tab=explode(",",$ligne);
                    if($promo==$tab[1]) {
                        $tab[4]=$tab[4]+1;
                        $new=$tab[0].','.$tab[1].','.$tab[2].','.$tab[3].','.$tab[4].','."\n";           
                    }
                    else{
                        $new=$ligne;
                    }
                    $bloc=$bloc.$new;
                }
                fclose($promos);
                $promos=fopen('promos.txt','w+');
                fputs($promos,$bloc);
                fclose($promos);    
        }
        ?>
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