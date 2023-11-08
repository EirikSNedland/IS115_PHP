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

        if (!$_SESSION["user"]["logedIn"]) {
            header("location: index.php");
            exit;
        }

        echo $_SESSION["user"]["email"] . "<br>";
        echo $_SESSION["user"]["fname"] . "<br>";
        echo $_SESSION["user"]["lname"] . "<br>";
        echo $_SESSION["user"]["mobil"] . "<br>";
        echo $_SESSION["user"]["role"] . "<br>";

        if(isset($_POST["logOut"])){
            unset($_SESSION["user"]);
            session_destroy();
            header("location: index.php");
            exit;
        }

        if(isset($_POST["laPage"])){
            header("location: laPage.php");
            exit;
        }
    ?>

    <form method="POST">
        <input type="submit" name="logOut" value="Logg ut">
    </form>

    <form method="POST">
        <input type="submit" name="laPage" value="Gå til La siden">
    </form>
    <?php 
        if(isset($_SESSION["msg"])){
            echo $_SESSION["msg"];
            //unset($_SESSION["msg"]);
        }
    ?>
</body>
</html>