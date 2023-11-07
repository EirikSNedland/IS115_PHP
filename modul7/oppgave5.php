<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 7.5</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php 
        include "div/dbcon.php";

        $sql = "SELECT u.fname AS fname, 
                u.lname AS lname,
                u.email AS email, 
                u.mobil AS mobil, 
                tu.fname AS tutor_fname, 
                tu.lname AS tutor_lname, 
                u.preference_course
            FROM users u 
            INNER JOIN tutors t ON u.preference_tutor = t.tutor_id 
            INNER JOIN users tu ON t.user = tu.user_id 
            ORDER BY u.preference_tutor, u.preference_course";

        $query = $pdo -> prepare($sql);


        try{
            #Sjekker om sql statement er skrevet korrekt
            $query -> execute();
        } catch (PDOException $e){
            echo $e; //Bør logges istedenfor skrevet ut, sikkerhets risiko
        }

        #Så lenge den henter rows skal while løkken kjøre, stopper når det ikke er flere rows å hente
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $users[] = $row; 
        }
        
        echo "<table>
                <thead>
                    <tr>
                        <th>Navn</th>
                        <th>email</th>
                        <th>Mobil</th>
                        <th>Preferanse LA</th>
                        <th>Preferanse kurs</th>
                    </tr>
                </thead>
                <tbody>";
        #Skal bare skrive ut info hvis det er info å skrive ut
        if ($query -> rowCount() > 0){
            foreach ($users as $user){
                echo "<tr>";
                echo "<td>" . $user -> fname . " " . $user -> lname  . "</td>";
                echo "<td>" . $user -> email . "</td>";
                echo "<td>" . $user -> mobil  . "</td>";
                echo "<td>" . $user -> tutor_fname . " " . $user -> tutor_lname  . "</td>";
                echo "<td>" . $user -> preference_course . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Database tom";
        }
        echo "</tbody> </tabele>";
    ?>
</body>
</html>