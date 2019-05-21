<?php

session_start();

  if(isset ($_GET['code'])){
      $statut="";
    $promos = fopen('apprenants.txt', 'r');
      while(!feof($promos)){
      $ligne =fgets($promos);
      $tab=explode(",",$ligne);
        if($_GET['code']==$tab[0]){
          if($tab[7]=="actif"){
              $tab[7]="exclu";

          }else{
              $tab[7]="actif";
          }
          $line=$tab[0].",".$tab[1].",".$tab[2].",".$tab[3].",".$tab[4].",".$tab[5].",".$tab[6].",".$tab[7].","."\n";
          $statut=$tab[7];
        }
        else{
            $line=$ligne;
        }
        $lesLignes=$lesLignes.$line;
    }
      fclose($promos);
      $promos = fopen('apprenants.txt', 'w+');
      fwrite($promos,$lesLignes);
      fclose($promos);
    }
    if(isset($_GET['promo'])){
      $promos=fopen('promos.txt','r');
      while(!feof($promos)){
          $ligne=fgets($promos);
          $tab=explode(",",$ligne);
          if($_GET['promo']==$tab[1]) {
             if($statut=="exclu"){
              $tab[4]=$tab[4]-1;
              $new=$tab[0].','.$tab[1].','.$tab[2].','.$tab[3].','.$tab[4].','."\n";
           }else{
                $tab[4]=$tab[4]+1;
              $new=$tab[0].','.$tab[1].','.$tab[2].','.$tab[3].','.$tab[4].','."\n";
            }       
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
      header("location: exclure.php");
    }



?>    