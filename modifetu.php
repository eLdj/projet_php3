<!DOCTYPE html>
<?php
include('menu.php');
?>

<div class="milieu" style="text-align : center;  width : 60%; margin-left : auto; margin-right : auto;">

    <div class="container-fluid mt-3">
        <h4 class="mb-2">Modification données apprenants</h4>
        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="code">Code</label>
                    <select id="code" class="form-control" name="code">
                        <?php
                        $etu = fopen('etu.txt', 'r');
                        while (!feof($etu)) {
                            $line1 = fgets($etu);
                            $col2 = explode(";", $line1);
                            echo "<option>" . $col2[5] . "</option>";
                        }
                        fclose($etu);
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="promo">Promotion</label>
                    <select id="promo" class="form-control" name="promo">
                        <?php
                        $promo = fopen('promo.txt', 'r');
                        while (!feof($promo)) {
                            $line0 = fgets($promo);
                            $col1 = explode(";", $line0);
                            echo "<option>" . $col1[1] . "</option>";
                        }
                        fclose($promo);
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" required id="nom" placeholder="Nom" name="nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>">
                </div>
                <div class="form-group col-sm-6">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" required id="prenom" placeholder="Prenom" name="prenom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
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
            </div>
            <button type="submit" class="btn btn-primary" name="modifiez">Modification</button>
        </form>
    </div>

</div>

<?php
$okmodif = "";
if (isset($_POST['modifiez'])) {
    $etu = fopen('etu.txt', 'a+');

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $naiss = $_POST['dateNaiss'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $code = $_POST['code'];
    $promo = $_POST['promo'];

    while (!feof($etu)) {
        $line = fgets($etu);
        $col = explode(";", $line);

        if ($code == $col[5]) {
            $code = $col[5];
            $promo = $col[6];
            $col[0] = $nom;
            $col[1] = $prenom;
            $col[2] = $naiss;
            $col[3] = $tel;
            $col[4] = $email;
            $modif = $col[0] . ";" . $col[1] . ";" . $col[2] . ";" . $col[3] . ";" . $col[4] . ";" . $col[5] . ";" . $col[6] . ";" .$col[7].";". "\n";
        } else {
            $modif = $line;
        }

        $okmodif = $okmodif . $modif;
    }
    fclose($etu);

    $etu = fopen('etu.txt', 'w+');
    fwrite($etu, trim($okmodif));
    fclose($etu);

    echo "Modification réussie";
}
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
    $etu = fopen('etu.txt', 'r');

    while (!feof($etu)) {
        $line = fgets($etu);
        $col = explode(";", $line);
        echo "<tr>";

        echo "<td>" . $col[0] . "</td>";
        echo "<td>" . $col[1] . "</td>";
        echo "<td>" . $col[2] . "</td>";
        echo "<td>" . $col[3] . "</td>";
        echo "<td>" . $col[4] . "</td>";
        echo "<td>" . $col[5] . "</td>";
        echo "<td>" . $col[6] . "</td>";
        echo "<td>" . $col[7] . "</td>";
        
        if($col[7]=='exclu'){
            echo "<td><a href='traitement.php?code=".$col[5]."'><button' class='btn btn-outline-success'>inscrit</button></a></td>";
        }
        else{
            echo "<td><a href='traitement.php?code=".$col[5]."'><button' class='btn btn-outline-danger'>exclu</button></a></td>";
        }
        echo "</tr>";
    }
    fclose($etu);

echo "</table>";

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>