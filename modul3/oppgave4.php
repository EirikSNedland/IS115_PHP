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
        if (isset($_GET["submit"])){
            $kommune = $_GET["kommune"];
            $kommune = ucfirst(strtolower($kommune));
            $fylke = match ($kommune) {
                "Kristiansand","Lillesand","Birkenes" => "Agder",
                "Harstad","Kvæfjord","Tromsø","Alta" => "Troms og Finnmark",
                "Bergen" => "Vestland",
                "Trondheim" => "Trøndelag",
                "Bodø" => "Nordland"
            };
            echo "$kommune ligger i $fylke fylke";
        }

    ?>
</body>
</html>