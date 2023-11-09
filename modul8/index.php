<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logg inn</title>
</head>
<body>
    <a href="../index.php">Go Back</a>
    <?php 
        include "div/validate.php";
        require_once "div/dbcon.php";

        session_start();

        #Hvis session med logOutMsg eksisterer: fjern den men lagre melding i variabel
        if (isset($_SESSION["logOutMsg"])) {
            $logOutMsg = $_SESSION["logOutMsg"];
            unset($_SESSION["logOutMsg"]);
        }

        if(isset($_POST["logIn"])){

            $email = sanetize($_POST["email"]);
            $password = sanetize($_POST["password"]);

            $sql = "SELECT users.user_id, fname, lname, email, mobil, users.password FROM users WHERE email = :email";

            $sp = $pdo -> prepare($sql);

            $sp -> bindParam(":email", $email, PDO::PARAM_STR);

            try{
                #Sjekker om sql statement er skrevet korrekt
                $sp -> execute();
            } catch (PDOException $e){
                echo $e; //Bør logges istedenfor skrevet ut, sikkerhets risiko
            }
    
            $user = $sp->fetch(PDO::FETCH_OBJ);

            if(!$user == null && password_verify($password, $user -> password)){
                $_SESSION['user']['email'] = $user -> email;
                $_SESSION['user']['userId'] = $user -> user_id;
                $_SESSION['user']['fname'] = $user -> fname;
                $_SESSION['user']['lname'] = $user -> lname;
                $_SESSION['user']['mobil'] = $user -> mobil;
                $_SESSION['user']['role'] = cheackUserRole($user -> user_id, $pdo);
                $_SESSION['user']['logedIn'] = true;
                
                header("Location: mainPage.php");
                exit();
            } else {
                echo "Feil brukernavn eller passord";
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
    <?php 
        if(isset($logOutMsg)){
            echo $logOutMsg;
        }
    ?>
</body>
</html>