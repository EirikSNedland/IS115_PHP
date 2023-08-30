<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Modul 3.3</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <form method="post">
        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="number" name="saldo">
        </div>
        <div class="form-group">
            <label for="rente">Rente aksetabelt format decimal: 50% skrives som 1.5</label>
            <input type="decimal" step="any" name="rente">
        </div>
        <div class="form-group">
            <label for="years">År frem i tid du vil se resultat</label>
            <input type="number" name="years">
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php 
        if(isset($_POST["submit"])){
        $saldo = $_POST["saldo"];
        $rente = $_POST["rente"];
        $years = $_POST["years"];

        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr><th>År</th><th>Saldo</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        for($Sn = 0; $Sn < $years + 1; $Sn++ ){
            if ($Sn == 0){
                $currentSaldo = $saldo;
            }else{
                $currentSaldo = $saldo * $rente;
            }
            echo "<tr><td>$Sn</td><td>$currentSaldo</td></tr>";
            $saldo = $currentSaldo;
        }
        echo "</tbody>";
        echo "</table>";
    }
    ?>
</body>
</html>