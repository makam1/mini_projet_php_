<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<title>Acceuil</title>
</head>
<body class="authentification">
  <div class=" container auth">
  <form class="" method="post" action=""><br><br><br><br>
  <h1 class="h3 mb-3 font-weight-normal" style="">Changez votre mot de passe</h1>
  <input type="password" name='pswd' id="inputPassword" class="form-control" placeholder="Password" required><br>
  <input type='submit' name='connecter' value='Valider' id='con' ><br><br>
</form>
</div>
<?php
    if(isset ($_POST['connecter'])){
      $fich='';
      $monfichier = fopen('users.txt', 'r');
      $monfichier2=fopen('users2.txt','w');
      $mdp=$_POST['pswd'];
        while(!feof($monfichier)){
        $ligne =fgets($monfichier);
        $tab=explode(",",$ligne);
          if($_SESSION['login']==$tab[1]){
            $tab[2]=$mdp;
            $line=$tab[0].",".$tab[1].",".$tab[2].",".$tab[3].",".$tab[4].",".$tab[5].",".$tab[6].",".$tab[7];

          }else{
            $line=$ligne;
       
          }
          $fich=$fich.$line;
        }
        fputs($monfichier2,trim($fich));
        fclose($monfichier);
        fclose($monfichier2);
        unlink("users.txt");
        rename("users2.txt", "users.txt");
     
        header('Location: accueil.html');
    } 
?> 
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>