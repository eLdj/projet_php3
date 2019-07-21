<!DOCTYPE html>
<?php
include('menu.php');
?>

<div class="milieu" style="text-align : center;  width : 60%; margin-left : auto; margin-right : auto;" >

<div class="container-fluid mt-3">
    <h4 class="mb-2">Plateforme d'inscriptions des apprenants de la Sonatel Academy</h4>
    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" required id="nom" placeholder="Nom" name="nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>">
            </div>
            <div class="form-group col-sm-6">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" required id="prenom" placeholder="Prenom" name="prenom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="dateNaiss">Date de naissance</label>
            <input type="date" class="form-control" required id="dateNaiss" placeholder="Date de naissance" name="dateNaiss" value="<?php if(isset($_POST['dateNaiss'])){echo $_POST['dateNaiss'];} ?>">
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="tel">Téléphone</label>
                <input type="tel" class="form-control" required id="tel" placeholder="Téléphone" name="tel" value="<?php if(isset($_POST['tel'])){echo $_POST['tel'];} ?>">
            </div>
            <div class="form-group col-sm-6">
                <label for="prenom">E-mail</label>
                <input type="email" class="form-control" required id="email" placeholder="E-mail" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" >
            </div>
            <div class="form-group col-sm-6">
                <label for="code">Code</label>
                <input type="text" class="form-control" required id="code" name="code"value="<?php if(isset($_POST['code'])){echo $_POST['code'];} ?>">
            </div>
            <div class="form-group col-sm-6">
                <label for="promo">Promotion</label>
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
        <button type="submit" class="btn btn-primary" name="inscrip">Inscription</button>
    </form>
</div>

</div>

<?php 
$inscrit=true;
    if(isset($_POST['inscrip'])){
       $nom = $_POST['nom'];
       $prenom = $_POST['prenom'];
       $naiss = $_POST['dateNaiss'];
       $tel = $_POST['tel'];
       $email = $_POST['email'];
       $code = $_POST['code'];
       $promo = $_POST['promo'];

       $etu = fopen('etu.txt', 'a+');
       flock($etu,2);

       while(!feof($etu)){
           
            $line = fgets($etu);
            $col = explode(";", $line);
          if($col[5]==$code){
              $inscrit=false;
          }
       }

        if($inscrit==false){
            
            echo "  cette apprenant c'est déjà inscrit";
            
        }
        else{
            $ajout = "\n".$nom.";".$prenom.";".$naiss.";".$tel.";".$email.";".$code.";".$promo.";"."inscrit".";";
            fwrite($etu,$ajout);
            echo "Inscription réuussit";
        }
            
       flock($etu,3);
       fclose($etu);
    }

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>