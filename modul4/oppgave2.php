<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modul 4.2</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>

    <!--Vasking av input og validerings funksjoner  -->
    <?php 
        function sanetize(string $text){
            $text = strip_tags($text);
            $text = htmlspecialchars($text);
            return $text;
        }
        function validateText(string $text){
            if(preg_match('@[0-9]@', $text) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $text)){
                return false;
            } else{
                return true;
            }
        }
        function validateMobileNr(string $mobilNr){
            if (preg_match('/^[0-9]{8}+$/',$mobilNr)){
                return true;
            } else{
                return false;
            }
        }
        function validatePassword(string $password){
            //har ikke alle if setningene i en if,elseif,elsif... for å få alle feilmeldingene med en gang
            $validated = true;
            if(strlen($password) <= 7 ){
                $validated = false;
            }
            if(!preg_match('@[A-Z]@', $password) || !preg_match('@[a-z]@', $password) || !preg_match('@[0-9]@',$password)){
                $validated = false;
            }
            return $validated;
        }

        function validateUserReg($array){
            $validated = true;
            if (!validateText($array["fname"]) ){
                echo "<p class='failure'>Fornavn inneholder ikke godkjent tegn som tall og spesialtegn</p>";
                $validated = false;
            }

            if (!validateText($array["lname"])){
                echo "<p class='failure'>Etternavn inneholder ikke godkjent tegn som tall og spesialtegn</p>";
                $validated = false;
            }

            if(!validateMobileNr($array["mobil"])){
                echo "<p class='failure'>Mobil nummer er ikke et gyldig nummer, må ha 8 siffer</p>";
                $validated = false;
            }

            if(!filter_var($array["email"],FILTER_VALIDATE_EMAIL)){
                echo "<p class='failure'>Ugyldig epost adresse</p>";
                $validated = false;
            }

            if(!validatePassword($array["password"])){
                if(strlen($array["password"]) < 8){
                    echo "<p class='failure'>Passord må inneholde minst 8 tegn</p>";
                }
                if(!preg_match('@[A-Z]@', $array["password"]) || !preg_match('@[a-z]@', $array["password"]) || !preg_match('@[0-9]@',$array["password"])){
                    echo "<p class='failure'>Passord må inneholde minst en liten bokstav, en stor bokstav og et tall</p>";
                }
                $validated = false;
            }

            return $validated;
        }
    ?>

    <!--Form, input får klassen highlightMistake hvis feilmelidng er knyttet til input-->
    <form method="post">
        <label for="fname">Fornavn
            <input <?php if(isset($_POST["submit"]) && !validateText(sanetize($_POST["fname"]))){echo "class='highlightMistake'";} ?>
                type="text" name="fname" placeholder="Fornavn" required>
        </label>
        <label for="lname">Etternavn
            <input <?php if(isset($_POST["submit"]) && !validateText(sanetize($_POST["lname"]))){echo "class='highlightMistake'";} ?>
                type="text" name="lname" placeholder="Etternavn" required>
        </label>
        <label for="mobil">Mobil Nummer
            <input <?php if(isset($_POST["submit"]) && !validateMobileNr(sanetize($_POST["mobil"]))){echo "class='highlightMistake'";} ?> type="tel" name="mobil" placeholder="Mobilnr" required>
        </label>
        <label for="email">Epost
            <input <?php if(isset($_POST["submit"]) && !filter_var(sanetize($_POST["email"]),FILTER_VALIDATE_EMAIL)){echo "class='highlightMistake'";} ?>
                type="text" name="email" placeholder="Epost" required>
        </label>
        <label for="password">Passord
            <input <?php if(isset($_POST["submit"]) && !validatePassword(sanetize($_POST["password"]))){echo "class='highlightMistake'";} ?>
                type="password" name="password" placeholder="Passord" required>
        </label>
        <label for="submit">
            <input class="formBtn" type="submit" name="submit" value="Registrer Bruker">
        </label>
    </form>
    
    <!--Sanetizer tekst-->
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
                printUserInfo($user);
            } else{
                echo "<p class='failure'>Veligst fyll in feltene med riktig info</p>";
            }   
        }
    ?>

    <!-- Print function -->
    <?php
        function printUserInfo($user){
            $fname = $user["fname"];
            $lname = $user["lname"];
            $mobil = $user["mobil"];
            $email = $user["email"];
            $password = $user["password"];
            echo "<h2>Bruker Info $fname $lname</h2>
                <ul>
                    <li>Fornavn: $fname</li>
                    <li>Etternavn: $lname</li>
                    <li>mobil: +47 $mobil</li>
                    <li>Epost: $email</li>
                    <li>Passord: $password</li>
                </ul>
            ";
        }
    ?>
</body>
</html>