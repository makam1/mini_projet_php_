
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
    <title>Connectez-vous</title>

  </head>
  <body class="text-center authentification">
    <div class="container auth" >
    <form class="form-signin" method="post" action="">
  <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal" style="">Authentifiez-vous</h1>
  <input type="login" name='login' id="inputlogin" class="form-control" placeholder="login" required autofocus><br>
  <input type="password" name='motdepasse' id="inputPassword" class="form-control" placeholder="Password" required>
  
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="se souvenir"> se souvenir
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Connection</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
</form>
<?php
        $ver=0;
        $auth=array(
            array('yacine','MmeSow','yacine123'),
            array('Mairame','Ayssat','MAK28'),
            array('Mr_Niasse','Niasse','SA2019'));
            $ligne=3;
                    $login='log';
                    $mdp='mot'; 
                    if (isset($_POST['login']) && isset($_POST['motdepasse'])) {
                        $login=$_POST['login'];
                        $mdp=$_POST['motdepasse'];   
                    } 

                    for($i=0;$i<$ligne;$i++){
                            if($login==$auth[$i][1] &&$mdp==$auth[$i][2]){
                             $ver=$ver+1;       
                        }
                        }
                    
                  if( $ver!=0){
                        header('Location: acceuil.php');
                    }
                  
            ?>
</div>
</body>
</html>
