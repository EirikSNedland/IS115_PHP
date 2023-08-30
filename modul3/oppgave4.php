<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 3.4</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <p>Kommuner som kan skrives inn:
        <ul>
            <li>Kristiansand</li>
            <li>Lillesand</li>
            <li>Birkenes</li>
            <li>Harstad</li>
            <li>Kvæfjord</li>
            <li>Tromsø</li>
            <li>Bergen</li>
            <li>Trondheim</li>
            <li>Bodø</li>
            <li>Alta</li>
        </ul>
    </p>
    <form>
        <label for="kommune">Sriv inn kommune</label>
        <input type="text" name="kommune">
        <input type="submit" name="submit" value="Sjekk tilhørlighet">
    </form>
    <?php
        $cheakKommuneInFylke = array();
        $cheakKommuneInFylke["Kristiansand"] = "Agder";
        $cheakKommuneInFylke["Lillesand"] = "Agder";
        $cheakKommuneInFylke["Birkenes"] = "Agder";
        $cheakKommuneInFylke["Harstad"] = "Troms og Finnmark";
        $cheakKommuneInFylke["Kvæfjord"] = "Troms og Finnmark";
        $cheakKommuneInFylke["Tromsø"] = "Troms og Finnmark";
        $cheakKommuneInFylke["Bergen"] = "Vestland";
        $cheakKommuneInFylke["Trondheim"] = "Trøndelag";
        $cheakKommuneInFylke["Bodø"] = "Nordland";
        $cheakKommuneInFylke["Alta"] = "Troms og Finnmark";

        if (isset($_GET["submit"])){
            $kommune = $_GET["kommune"];
            $fylke = $cheakKommuneInFylke[$kommune];
            echo "$kommune ligger i $fylke fylke";
        }

    ?>
</body>
</html>