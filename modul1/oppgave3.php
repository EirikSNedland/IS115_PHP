<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Go Back</a> <br>
    <?php
        $name = "Gunnar";
        $age = "12";
        echo "<h5>Paragraf</h5><p> Navnet til bruker er $name og alderen til bruker er  $age</p>";
        echo "<h5>Numerert liste</h5>
            <ol> 
                <li>Navn: $name </li>
                <li>Alder: $age </li>
            </ol>";
        echo "<h5>Punkt liste</h5><ul> <li>Navn: $name</li><li>Alder: $age </li></ul>";
        echo "<h5>Tabell</h5>
            <table class='table-bordered'>
                <thead>
                    <tr>
                        <th>Navn</th>
                        <th>Alder</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$name</td>
                        <td>$age</td>
                    </tr>
                </tbody>
            </table>"
    ?>
</body>
</html>
