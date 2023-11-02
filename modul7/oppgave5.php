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

        $getUserSql = "SELECT * FROM USERS";

        $sp = $pdo -> prepare($getUserSql);

        try{
            #Sjekker om sql statement er skrevet korrekt
            $sp -> execute();
        } catch (PDOException $e){
            echo $e; //Bør logges istedenfor skrevet ut, sikkerhets risiko
        }
        
        while ($row = $sp->fetch(PDO::FETCH_OBJ)) {
            $users[] = $row; 
        }
    ?>
    <form method="POST">
        <select name="userId">
            <option selected="true" disabled="disabled">Velg bruker</option>
            <?php 
                foreach ($users as $user){
                    echo "<option value='". $user -> user_id ."'>". $user -> fname. " ". $user -> lname . "</option>";
                }
            ?>
        </select>
        <input name="getPrefrences" type="submit" value="Se preferanser for bruker">
    </form>

    <?php 
        if (isset($_POST["getPrefrences"])){
            $sql = "SELECT timeslot_id, tutors.fname, tutors.lname, ts_date, start_time, location, course 
            FROM timeslots INNER JOIN tutors ON tutors.tutor_id = timeslots.tutor_id 
            WHERE timeslots.tutor_id = :preference_tutor AND course = :preference_course";

            $sp = $pdo -> prepare($sql);

            foreach ($users as $user) {
                if ($user->user_id == $_POST["userId"]) {
                    $desiredUser = $user; 
                    break; 
                }
            }

            $sp -> bindParam(":preference_tutor", $desiredUser -> preference_tutor, PDO::PARAM_STR);
            $sp -> bindParam(":preference_course", $desiredUser -> preference_course, PDO::PARAM_STR);

            try{
                #Sjekker om sql statement er skrevet korrekt
                $sp -> execute();
            } catch (PDOException $e){
                echo $e; //Bør logges istedenfor skrevet ut, sikkerhets risiko
            }

            while ($row = $sp->fetch(PDO::FETCH_OBJ)) {
                $timeslots[] = $row; 
            }

            echo "<p>Bruker: ".  $desiredUser -> fname . " " . $desiredUser -> lname . "<br>
                ID til LA preferanse: ".  $desiredUser -> preference_tutor . "<br>
                Kurs preferanse: " . $desiredUser -> preference_course . "</p>";

            #Kopiert fra oppgave 1, endret på enkelte ting
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
            if ($sp -> rowCount() > 0){
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
                echo "Ingen timeslots oppfyller dine preferanser";
            }
            echo "</tbody> </tabele>";
        }
    ?>
</body>
</html>