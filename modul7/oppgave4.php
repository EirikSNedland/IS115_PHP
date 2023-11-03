<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 7.4</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php 
        include "div/dbcon.php";

        #Query som henter alle timeslot med dagens dato eller senere
        $sql = "SELECT timeslot_id, fname, lname, ts_date, start_time, location, course 
            FROM timeslots INNER JOIN tutors ON timeslots.tutor_id = tutors.tutor_id WHERE ts_date >= NOW()  ORDER BY ts_date";
            
        $query = $pdo -> prepare($sql);


        try{
            #Sjekker om sql statement er skrevet korrekt
            $query -> execute();
        } catch (PDOException $e){
            echo $e; //Bør logges istedenfor skrevet ut, sikkerhets risiko
        }

        #Så lenge den henter rows skal while løkken kjøre, stopper når det ikke er flere rows å hente
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $timeslots[] = $row; 
        }
        
        echo "<table>
                <thead>
                    <tr>
                        <th>LA</th>
                        <th>Dato</th>
                        <th>Start tid</th>
                        <th>Lokasjon</th>
                        <th>Kurs</th>
                    </tr>
                </thead>
                <tbody>";
        #Skal bare skrive ut info hvis det er info å skrive ut
        if ($query -> rowCount() > 0){
            foreach ($timeslots as $timeslot){
                echo "<tr>";
                echo "<td>" . $timeslot -> fname . " " . $timeslot -> lname  . "</td>";
                echo "<td>" . $timeslot -> ts_date . "</td>";
                echo "<td>" . $timeslot -> start_time  . "</td>";
                echo "<td>" . $timeslot -> location  . "</td>";
                echo "<td>" . $timeslot -> course . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Database tom";
        }
        echo "</tbody> </tabele>";
    ?>
</body>
</html>