<?php 
    function sanetize(string $text){
        $text = strip_tags($text);
        $text = htmlspecialchars($text);
        return $text;
    }

    require_once "dbcon.php";

    function cheackUserRole($userId ,$pdo){

        $sql = "SELECT tutor_id FROM tutors WHERE tutors.user = :user_id";

        $sp = $pdo -> prepare($sql);

        $sp -> bindParam(":user_id", $userId, PDO::PARAM_INT);

        try{
            #Sjekker om sql statement er skrevet korrekt
            $sp -> execute();
        } catch (PDOException $e){
            exit;
        }

        $result = $sp->fetch(PDO::FETCH_OBJ);

        if (!$result != null) { 
            return "Student";
        } else {
            return "LA";
        }
    }
?>