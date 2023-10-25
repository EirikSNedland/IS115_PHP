<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 6.2</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php 
        include "klasserOppgave1og2/Tutor.php";

        $tutor = new Tutor();
        $user = new User();

        $tutor -> fName = "Karl Johan";
        $tutor -> lName = "Bernadotte";
        $tutor -> userName = "KarlusRexBerni";
        $tutor -> birthDate = "2000-11-24";
        $tutor -> dateOfRegister = "2023-10-24";

        $user -> fName = "Cookie";
        $user -> lName = "Monster";
        $user -> userName = "CookieMonsterDeluxe";
        $user -> birthDate = "2000-11-24";
        $user -> dateOfRegister = "2023-10-24";
    ?>

    <p>
        <?php echo "<p> " .  $tutor -> printAllUserInfo() . "</p>"; ?>
        <form method="POST">
            <input type="submit" name="getRoleTutor" value="Kjør getRole i Tutor objekt">
        </form>
    </p>

    <p>
        <?php echo "<p> " .  $user -> printAllUserInfo() . "</p>"; ?>
        <form method="POST">
            <input type="submit" name="getRoleUser" value="Kjør getRole i User objekt">
        </form>
    </p>

    <?php 
        echo "<p>";
        if(isset($_POST["getRoleTutor"])){
            echo $tutor -> getFullName() . " har rolen " . $tutor -> getRole();
        }
        if(isset($_POST["getRoleUser"])){
            echo $user -> getFullName() . " har rolen " . $user -> getRole();
        }
        echo "</p>";
    ?>
</body>
</html>