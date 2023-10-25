<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 6.5</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <P>Oppgave: Metoden må self finne ut hvilken type input det er, Typer input:
        <ul>
            <li>Epost</li>
            <li>Mobil nummer</li>
            <li>Passord</li>
        </ul>
        Input må bestå valideringskravene til minst en av disse tre alternativene
    </P>
    <form method="POST">
        <label for="input">Input: </label>
        <input type="text" name="input">
        <input type="submit" name="submit" value="valider">
    </form>
    <?php
    include "klasserOppgave4og5/Validate.php";
        if(isset($_POST["submit"])){
            Validate::findTypeOfInput($_POST["input"]);
        }
    ?>
</body>
</html>