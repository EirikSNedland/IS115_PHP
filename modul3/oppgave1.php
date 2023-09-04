<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 3.1</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <h1>Sjekk om fristen er ute!</h1>
    <p>Skriv inn dato til jobb annonse eller event for å se om fristen har gått ut</p>
    <form method="get">
        <input type="date" name="inputDate">
        <input type="submit" value="Sjekk dato">
    </form>
    <?php
        $inputDate = $_GET["inputDate"];
        $currentDate = date("Y-m-d");
        if ($inputDate >= $currentDate){
            echo "<p><b>Fristen har ikke gått ut</b>, du kan fremdeles nå det</p>";
        } else{
            echo "<p><b>Fristen er ute</b></p>";
        }
    ?>
</body>
</html>