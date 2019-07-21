<!DOCTYPE html>
<?php include('menu.php'); ?>

<div class="milieu" style="text-align : center;  width : 60%; margin-left : auto; margin-right : auto;">

    <div class="container-fluid mt-3">
        <h4 class="mb-2">Modification des Promotions</h4>
        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="promo">Promotion</label>
                    <select id="promo" class="form-control" name="codpromo">
                        <?php
                        $promo = fopen('promo.txt', 'r');
                        while (!feof($promo)) {
                            $line0 = fgets($promo);
                            $col1 = explode(";", $line0);
                            echo "<option>" . $col1[0] . "</option>";
                        }
                        fclose($promo);
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nompromo">Nom</label>
                    <input type="text" class="form-control" required id="nompromo" placeholder="Nom de la promo" name="nompromo" value="<?php if(isset($_POST['nompromo'])){echo $_POST['nompromo'];} ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="debpromo">Début de la promotion</label>
                    <input type="month" class="form-control" required id="debpromo" name="debpromo" value="<?php if(isset($_POST['debpromo'])){echo $_POST['debpromo'];} ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="modifiez">Modifiez</button>
        </form>
    </div>
</div>
<?php
$okmodif = "";
$verifmodif=false;
if (isset($_POST['modifiez'])) {
    $promo = fopen('promo.txt', 'a+');

    $codpromo = $_POST['codpromo'];
    $nompromo = $_POST['nompromo'];
    $debpromo = $_POST['debpromo'];
    while (!feof($promo)) {
        $line = fgets($promo);
        $col = explode(";", $line);

        if ($codpromo == $col[0]) {
            $verifmodif=true;
            $col[1] = $nompromo;
            $col[2] = $debpromo;
            $modif = $col[0] . ";" . $nompromo . ";" . $col[2] . ";" . "\n";
        } else {
            $modif = $line;
        }

        $okmodif = $okmodif . $modif;
    }
    fclose($promo);

    $promo = fopen('promo.txt', 'w+');
    fwrite($promo, trim($okmodif));
    fclose($promo);

    if($verifmodif=true){
        echo "Modification effectué";
    }
}
echo "<table class ='table' >
    <thead class='thead-dark'>
        <tr>
            <th scope='col'>Code Promo</th>
            <th scope='col'>Nom Promo</th>
            <th scope='col'>Date de début</th>
            <th scope='col'></th>
        </tr>
    </thead>";

    $promo = fopen('promo.txt', 'r');
    while (!feof($promo)) {
        $line = fgets($promo);
        $col = explode(";", $line);

        echo "<tr>";
        for ($i = 0; $i < count($col); $i++) {

            echo "<td>" . $col[$i] . "</td>";
        }
        echo "</tr>";
    }
    fclose($promo);
echo "</table>";

?>

</body>

</html>