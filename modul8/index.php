<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logg inn</title>
</head>
<body>
    <?php 
        include "div/validate.php";
        require_once "div/dbcon.php";

        if(isset($_POST["logIn"])){
            $email = sanetize($_POST["email"]);
            $password = sanetize($_POST["password"]);

            $sql = "SELECT fname, lname, email, mobil, users.password FROM users WHERE email = :email";

            $sp = $pdo -> prepare($sql);

            $sp -> bindParam(":email", $email, PDO::PARAM_STR);

            try{
                #Sjekker om sql statement er skrevet korrekt
                $sp -> execute();
            } catch (PDOException $e){
                echo $e; //Bør logges istedenfor skrevet ut, sikkerhets risiko
            }
    
            $user = $sp->fetch(PDO::FETCH_OBJ);

            print_r($user);


            if(password_verify($password, $user -> password)){
                echo "<br>success";
            }
        }
    ?>
    <form method="POST">
        <label for="email">Email</label>
        <input type="text" name="email">

        <label for="password">Passord</label>
        <input type="password" name="password">

        <input type="submit" name="logIn" value="Logg Inn">
    </form>
</body>
</html>