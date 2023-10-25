<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 6.3</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php 
        include "klasserOppgave3/User.php";

        $user = new User();
        $user2 = new User();

        $user -> fName = "Cookie";
        $user -> lName = "Monster";
        $user -> birthDate = "2000-11-24";

        $user2 -> fName = "Karl Johan";
        $user2 -> lName = "Bernadotte";
        $user2 -> birthDate = "2000-11-24";

        echo "<b>Brukere:</b><br>";
        echo "<p>" . $user -> printAllUserInfo() .  "</p>";
        echo "<p>" . $user2 -> printAllUserInfo() .  "</p>";

        echo "<p><i>Slettet bruker liste før noen objekter er slettet</i></p>";
        #Henter slettede brukernavn fra statisk variabel i klassen User
        User::printArrayDeletedUsernames();

        echo "<p><i>Objektene blir slettet</i></p>";
        #destruct av objektene
        unset($user);
        unset($user2);
        
        User::printArrayDeletedUsernames();

    ?>
</body>
</html>