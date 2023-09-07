<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!--Bootstrap, for å gjør tabellen litt mer leslig-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Modul 4.4</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php 
        $jobs = array(
            "RandomItSelskap" => array(
                "Overskrift" => "IT utvikler",
                "Beskrivelse" => "Trenger en utvikler for et spennede prosjekt!",
                "Stilling" => "Utvikler",
                "Frist" => "2023-12-12",
                "Sted" => "Lundsgate 666"
            ),
            "TransportAS" => array(
                "Overskrift" => "Lastebil sjofør",
                "Beskrivelse" => "Liker du å kjøre bil? Da er dette jobben for deg",
                "Stilling" => "Sjofør",
                "Frist" => "2024-06-12",
                "Sted" => "Askoschenkersgate 420"
            ),
            "ASKO" => array(
                "Overskrift" => "Lagermedarbeider",
                "Beskrivelse" => "Vil du ha mer trenning i arbeid og få betalt for det? Da er dette jobben for deg! Løft kasser for oss fra soloppgang til solnedgang!",
                "Stilling" => "Lagermedarbeider",
                "Frist" => "2023-09-03",
                "Sted" => "Lagerveien 60"
            )
        );
        printData($jobs);
        function printData($jobs){
            echo "<table class='table-bordered'>
                <thead>
                    <tr>
                        <th>Bedrift</th>
                        <th>Overskrift</th>
                        <th>Beskrivelse</th>
                        <th>Stilling</th>
                        <th>Frist</th>
                        <th>Sted</th>
                    </tr>
                </thead>
                <tbody>
            ";
            foreach($jobs as $job){
                $company = array_search($job, $jobs);
                echo "<tr>
                        <th>$company</th>
                        <td>".$job['Overskrift']."</td>
                        <td>".$job['Beskrivelse']."</td>
                        <td>".$job['Stilling']."</td>
                        <td>".$job['Frist']."</td>
                        <td>".$job['Sted']."</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        }
    ?>
</body>
</html>