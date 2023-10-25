<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 6.4</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <form method="POST">
        <label for="email">Epost: </label>
        <input type="text" name="email">
        <input type="submit" name="submit" value="valider">
    </form>
    <?php
    include "klasserOppgave4og5/Validate.php";
        if(isset($_POST["submit"])){
           if(Validate::validateEmail($_POST["email"])){
                echo "gyldig epost adresse";
           } else {
                echo "Ugyldig epost adresse";
           }
        }
    ?>
</body>
</html>