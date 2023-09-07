<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modul 4.3</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php
    $user = array(
        "fname" => "Lars",
        "lname" => "Gunnarsson",
        "email" => "lars@gunnar.moc"
    );
    if(isset($_POST["submit"])){
        if(validateInput()){
            $user["fname"] = $_POST["fname"];
            $user["lname"] = $_POST["lname"];
            $user["email"] = $_POST["email"];
            echo "<p class='success'>Dine endringer er lagret</p>";
        } 
    }

    //copy pastedv validering funksjonene fra oppgave2.php
    function validateInput(){
        $validated = true;
        if (!validateText($_POST["fname"])){
            echo "<p class='failure'>Fornavn inneholder ikke godkjent tegn som tall og spesialtegn</p>";
            $validated = false;
        }
        if (!validateText($_POST["lname"])){
            echo "<p class='failure'>Etternavn inneholder ikke godkjent tegn som tall og spesialtegn</p>";
            $validated = false;
        }
        if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            echo "<p class='failure'>Ugyldig epost adresse</p>";
            $validated = false;
        }
        if (!$validated){
            echo "<p class='failure'>Ingen endringer ble lagret</p>";
        }
        return $validated;
    }
    function validateText(string $text){
        if(preg_match('@[0-9]@', $text) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $text)){
            return false;
        } else{
            return true;
        }
    }

    ?>
    <form method="post">
        <label for="fname"> Fornavn
            <input type="text" name="fname" <?php echo "value='".$user['fname']."'"?> required>
        </label>
        <label for="lname"> Etternavn
            <input type="text" name="lname" <?php echo "value='".$user['lname']."'"?> requried>
        </label>
        <label for="email">Epost
            <input type="email" name="email" <?php echo "value='".$user['email']."'"?> required>
        </label>
        <label for="submit">
            <input type="submit" name="submit" value="submit">
        </label>
    </form>
    <?php
       echo "<ul>
                <li>".$user["fname"]."</li>
                <li>".$user["lname"]."</li>
                <li>".$user["email"]."</li>
            </ul>" 
    ?>
</body>
</html>