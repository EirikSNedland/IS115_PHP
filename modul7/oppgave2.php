<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="div/style.css">
    <title>Oppgave 7.2</title>
</head>
<body>
    <?php 
        include "div/validate.php";
        include "div/dbcon.php";
    ?>
    <a href="index.php">Go Back</a><br>

    <!--Form, input får klassen highlightMistake hvis feilmelidng er knyttet til input-->
    <form method="post">
        <label for="fname">Fornavn
            <input <?php if(isset($_POST["submit"]) && !validateText(sanetize($_POST["fname"]))){echo "class='highlightMistake'";} ?>
                type="text" name="fname" placeholder="Fornavn" >
        </label>
        <label for="lname">Etternavn
            <input <?php if(isset($_POST["submit"]) && !validateText(sanetize($_POST["lname"]))){echo "class='highlightMistake'";} ?>
                type="text" name="lname" placeholder="Etternavn" >
        </label>
        <label for="mobil">Mobil Nummer
            <input <?php if(isset($_POST["submit"]) && !validateMobileNr(sanetize($_POST["mobil"]))){echo "class='highlightMistake'";} ?>
             type="tel" name="mobil" placeholder="Mobilnr" >
        </label>
        <label for="email">Epost
            <input <?php if(isset($_POST["submit"]) && !filter_var(sanetize($_POST["email"]),FILTER_VALIDATE_EMAIL)){echo "class='highlightMistake'";} ?>
                type="text" name="email" placeholder="Epost" >
        </label>
        <label for="password">Passord
            <input <?php if(isset($_POST["submit"]) && !validatePassword(sanetize($_POST["password"]))){echo "class='highlightMistake'";} ?>
                type="password" name="password" placeholder="Passord" >
        </label>
        <label for="submit">
            <input class="formBtn" type="submit" name="submit" value="Registrer Bruker">
        </label>
    </form>

    <?php 
        if(isset($_POST["submit"])){
            $fname = sanetize($_POST["fname"]);
            $lname = sanetize($_POST["lname"]);
            $mobil = sanetize($_POST["mobil"]);
            $email = sanetize($_POST["email"]);
            $password = sanetize($_POST["password"]);

            $user = array("fname"=>$fname,"lname"=>$lname,"mobil"=>$mobil,"email"=>$email, "password" => $password);

            if(validateUserReg($user)){
                echo "<p class='success'>Bruker er registrert</p>";
                $currentDate = date("y-M-d");
                $user["password"] =  password_hash($user["password"], PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (fname, lname, mobil, email, password, created_at) 
                        VALUES (:fname, :lname, :mobil, :email, :password, :created_at)";
                $sp = $pdo -> prepare($sql);

                $sp -> bindParam(":fname", $user["fname"], PDO::PARAM_STR);
                $sp -> bindParam(":lname", $user["lname"], PDO::PARAM_STR);
                $sp -> bindParam(":mobil", $user["mobil"], PDO::PARAM_STR);
                $sp -> bindParam(":email", $user["email"], PDO::PARAM_STR);
                $sp -> bindParam(":password", $user["password"], PDO::PARAM_STR);
                $sp -> bindParam(":created_at", $currentDate);

                try {
                    $sp -> execute();
                } catch (PDOException $e){
                    #Exception bør logges ikke skrives ut på skjerm
                    echo $e -> getMessage() . "<br>";
                }

                if ($pdo -> lastInsertId() > 0){ //data ble lagret
                    echo "<br>Bruker ble lagret";
                } else{ //data ble ike lagret
                    echo "<br>Bruker ble ikke lagret";
                }

            } else{
                echo "<p class='failure'>Veligst fyll in feltene med riktig info</p>";
            }   

        }
    ?>
</body>
</html>