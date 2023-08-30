<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 2.1</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php 
        $etternavn = "nEDLAND";
        $etternavn = ucfirst(strtolower($etternavn));
        echo "<p>$etternavn</p>";
        echo  "<p>Etternavnet har en lengde på " . strlen($etternavn) . " bokstaver</p>";
    ?>
</body>
</html>