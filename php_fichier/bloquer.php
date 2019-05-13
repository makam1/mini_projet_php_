<?php

session_start();

  if(isset ($_GET['login'])){
    $monfichier = fopen('users.txt', 'r');
    $monfichier2=fopen('users2.txt','w');
      while(!feof($monfichier)){
      $ligne =fgets($monfichier);
      $tab=explode(",",$ligne);
        if($_GET['login']==$tab[1]){
          if($tab[7]=="actif\n" || $tab[7]=="actif"){
              $tab[7]="bloquer";

          }else{
              $tab[7]="actif";
          }
          $line=$tab[0].",".$tab[1].",".$tab[2].",".$tab[3].",".$tab[4].",".$tab[5].",".$tab[6].",".$tab[7]."\n";
        }
        else{
            $line=$ligne;
        }
        $lesLignes=$lesLignes.$line;
    } 
    fwrite($monfichier2,trim($lesLignes));

      fclose($monfichier);
      fclose($monfichier2);
      unlink("users.txt");
      rename("users2.txt", "users.txt");
      header("location: listerusers.php");
   
}
if($_SESSION['profil']!="admin"){
  header('Location: acceuil.php');
}

?>    