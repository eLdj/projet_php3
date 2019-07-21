<!DOCTYPE html>
<?php include('menu.php');?>

<div class="milieu" style="text-align : center;  width : 60%; margin-left : auto; margin-right : auto;" >

<div class="container-fluid mt-3">
    <h4 class="mb-2">Voici nos différentes promotions</h4>
    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="codpromo">Code Promo</label>
                <input type="text" class="form-control" id="codpromo" required value="<?php if(isset($_POST['codpromo'])){echo $_POST['codpromo'];} ?>" placeholder="Code de la promo" name="codpromo">
            </div>
            <div class="form-group col-sm-6">
                <label for="nompromo">Nom</label>
                <input type="text" class="form-control" required id="nompromo" placeholder="Nom de la promo" name="nompromo" value="<?php if(isset($_POST['nompromo'])){echo $_POST['nompromo'];} ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="debpromo">Début de la promotion</label>
                <input type="month" class="form-control" required id="debpromo"  name="debpromo" value="<?php if(isset($_POST['debpromo'])){echo $_POST['debpromo'];} ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="ajoutez">Ajoutez</button>
    </form>
</div>
</div>
<?php
$ajoutpromo=true;
if(isset($_POST['ajoutez'])){
    $promo=fopen('promo.txt','a+');
    flock($promo,2);
    
    $codpromo = $_POST['codpromo'];
    $nompromo = $_POST['nompromo'];
    $debpromo = $_POST['debpromo'];

    while(!feof($promo)){
        $line = fgets($promo);
        $col = explode(";", $line);

       for($i=0; $i<count($col); $i++){
            
            if($col[0]==$codpromo){
                $ajoutpromo = false;
            }

        }
    }

    if($ajoutpromo==false){
        echo "Promo existante";
    }
    else{
        $newpromo = "\n".$codpromo.";".$nompromo.";".$debpromo;
        fwrite($promo,$newpromo);
    }
    flock($promo,3);
    fclose($promo);
   
}
echo "<table class ='table' >
    <thead class='thead-dark'>
        <tr>
            <th scope='col'>Code Promo</th>
            <th scope='col'>Nom Promo</th>
            <th scope='col'>Date de début</th>
            <th scope='col'>Nombre d'apprenant</th>
        </tr>
    </thead>";

    $promo=fopen('promo.txt','r');
    while(!feof($promo)){
        $line = fgets($promo);
        $col = explode(";", $line);
        
        $etu=fopen('etu.txt', 'r');
        $i=0;
       
        while(!feof($etu)){
            $line1 = fgets($etu);
            $col1 = explode(";", $line1);
            
            if($col[1]==$col1[6] && $col1[7]!='exclu'){
                $i++;
            }
              
        }fclose($etu);
        
        echo "<tr>";
            echo "<td>".$col[0]."</td>";
            echo "<td>".$col[1]."</td>";
            echo "<td>".$col[2]."</td>";
            echo "<td>".$i."</td>";
        echo "</tr>";
    }
    fclose($promo);
    
echo "</table>";
    
?>
    
</body>
</html>