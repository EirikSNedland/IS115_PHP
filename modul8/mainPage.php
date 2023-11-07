<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();

        if (!isset($_SESSION["user"])) {
            header("location: index.php");
            exit;
        }

        echo $_SESSION["user"]["email"] . "<br>";
        echo $_SESSION["user"]["fname"] . "<br>";
        echo $_SESSION["user"]["lname"] . "<br>";
        echo $_SESSION["user"]["mobil"] . "<br>";

        if(isset($_POST["logOut"])){
            unset($_SESSION["user"]);
            header("location: index.php");
            exit;
        }
    ?>

    <form method="POST">
        <input type="submit" name="logOut" value="Logg ut">
    </form>
</body>
</html>