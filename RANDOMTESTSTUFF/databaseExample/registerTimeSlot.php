<?php 
    require_once('databaseCon.inc.php');

    $sql = "INSERT INTO timeslots 
            (ts_date, tutor_id, start_time, location, course ) 
            VALUES 
            (:ts_date, tutor_id, :start_time, :location, :course)"; 

    if (isset($_POST["submit"])){
        
    }

    $getTsFromDb = "SELECT fname, lname, ts_date, start_time, location,course 
                    FROM timeslots INNER JOIN tutor ON tutor.tutor_id = timeslots.tutor_id";
    
    $q = $pdo -> prepare($getTsFromDb);
    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>"; // Aldri gjør dette i produksjon!
    }
    
    $timeSlots = $q->fetchAll(PDO::FETCH_OBJ);
?>

<form method="POST">
    <label for="ts_date">Dato:</label>
    <input name="ts_date" type="date">
    <label for="tutor_id">LA id:</label>
    <input name="tutor_id" type="number">
    <label for="start_time">Start tid:</label>
    <input name="start_time" type="time">
    <label for="location">Sted:</label>
    <input name="location" type="text">
    <label for="course">For kurs:</label>
    <input name="course" type="text">
    <input name="submit" type="submit">
</form>

<?php 
    echo "<table>";
    foreach($timeSlots as $timeSlot){
        echo "<tr>";
        foreach ($timeSlot as $element){
            echo "<td>". $element . "</td>";
        }
        echo "</tr>";
    }
?>