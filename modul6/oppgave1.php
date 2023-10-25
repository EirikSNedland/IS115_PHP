<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 6.1</title>
</head>
<body>
    <?php 
        include "klasserOppgave1og2/User.php";

        $user = new User();

        #fyller informasjon til objektet
        $user -> fName = "Cookie";
        $user -> lName = "Monster";
        $user -> userName = "CookieMonsterDeluxe";
        $user -> birthDate = "2000-11-24";
        $user -> dateOfRegister = "2023-10-24";
    ?>

    <a href="index.php">Go Back</a><br>

    <form method="POST">
        <input type="submit" name="printUserInfo" value="printUserInfo metode">
    </form>

    <form method="POST">
        <input type="submit" name="getFullName" value="Sett sammen fornavn og etternavn metode">
    </form>

    <?php 
        if (isset($_POST["printUserInfo"])){
            $user -> printAllUserInfo();
        }
        
        if (isset($_POST["getFullName"])){
            echo $user -> getFullName();
        }
    ?>
</body>
</html>