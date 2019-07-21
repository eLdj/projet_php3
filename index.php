<!DOCTYPE html>

<?php include('menu.php');?>
<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label for="promo"><h4>Vous pouvez faire la recherche par promotion</h4></label>
            <select id="promo" class="form-control" name="promo">
                <?php
                $promo=fopen('promo.txt', 'r');
                while(!feof($promo)){
                    $line = fgets($promo);
                    $col = explode(";", $line);
                    echo "<option>".$col[1]."</option>";  
                }
                fclose($promo);
                ?>
            </select>
            
        </div>  
    </div> 
    <button type="submit" class="btn btn-primary" name="validez">Validez</button>
</form>
<?php
    if(isset($_POST['validez'])){
        $recher=$_POST['promo'];
        echo "<table class ='table' >
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>Nom</th>
                    <th scope='col'>Prénom</th>
                    <th scope='col'>Date de naissance</th>
                    <th scope='col'>Téléphone</th>
                    <th scope='col'>E-mail</th>
                    <th scope='col'>Code</th>
                    <th scope='col'>Promotion</th>
                    <th scope='col'>Statut</th>
                    <th scope='col'></th>
                </tr>
            </thead>";

            echo "<tbody>";
        $etu = fopen('etu.txt','r');

        while(!feof($etu)){
            $line1 = fgets($etu);
            $col1 = explode(";",$line1);
            echo "<tr>";
                if($col1[6]==$recher){
                    if($col1[7]=='inscrit'){
                        echo "<td>".$col1[0]."</td>";
                        echo "<td>".$col1[1]."</td>";
                        echo "<td>".$col1[2]."</td>";
                        echo "<td>".$col1[3]."</td>";
                        echo "<td>".$col1[4]."</td>";
                        echo "<td>".$col1[5]."</td>";
                        echo "<td>".$col1[6]."</td>";
                    }
                }
            echo "</tr>";
        
        }
        fclose($etu);

    }
    echo "</tbody>";
    
    echo "</table>";
?>
    
  
</body>
</html>
