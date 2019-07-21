<?php
  $code = $_GET['code'];

  $etu = fopen('etu.txt', 'r');

  while(!feof($etu)){
    $line = fgets($etu); 
    $col = explode(";", $line);

    if($col[5]==$code){
        
        if($col[7]=="inscrit" || $col[7]=="inscrit\n"){
            $col[7]="exclu";
        }
        else{
            $col[7]='inscrit';
        }
        $newline = $col[0].";".$col[1].";".$col[2].";".$col[3].";".$col[4].";".$col[5].";".$col[6].";".$col[7].";"."\n";
    }
    else{
        $newline = $line;
    }

    $okstatut=$okstatut.$newline;
}
fclose($etu);

$etu=fopen('etu.txt','w+');
fwrite($etu,trim($okstatut));
fclose($etu);
header('location:modifetu.php');
?>