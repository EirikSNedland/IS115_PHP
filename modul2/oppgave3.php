<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 2.3</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <form method="get">
        <label for="email">Skriv inn email</label>
        <input type="text" name="email">
        <input type="submit" name="submitEmail" value="valider">
    </form>
    <?php
        if (isset($_GET["email"])){
            $epost = $_GET["email"];
            if (filter_var($epost, FILTER_VALIDATE_EMAIL)) {
                echo "Epost: $epost er godkjent/validert";
            } else{
                echo "Epost: $epost er ikke godkjent/validert";
            } 
        }
    ?>
</body>
</html>