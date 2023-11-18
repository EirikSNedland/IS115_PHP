<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="katalog/style.css">
    <title>Modul 9.1</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <table>
        <thead>
            <tr>
                <th>Filnavn</th>
                <th>Filtype</th>
                <th>Filstørrelse</th>
                <th>sist endret</th>
                <th>Kjørbar</th>
                <th>Lesbar</th>
                <th>Skrivbar</th>
            </tr>
        </thead>
        <tbody>
    <?php
        require("Logger.php");
        $event = "Side oppgave 1 lastet inn";
        loggEvent($event);

        $folder = "./katalog/";
        $pointer = opendir($folder);
        while ($file = readdir($pointer)){
            echo "<tr>";
            echo "<td>". $file . "</td>";
            echo "<td>". filetype($folder . $file) . "</td>";
            echo "<td>". filesize($folder . $file) . "</td>";
            echo "<td>". date( "d.m.Y H:i" , filemtime($folder . $file)) . "</td>";
            echo "<td>". (is_executable($folder . $file) ? "Ja" : "Nei") . "</td>";
            echo "<td>". (is_readable($folder . $file) ? "Ja" : "Nei") . "</td>";
            echo "<td>". (is_writable($folder . $file) ? "Ja" : "Nei") . "</td>";
            echo "</tr>";
        }
    ?>
        </tbody>
    </table>
</body>
</html>