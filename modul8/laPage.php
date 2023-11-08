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

        if($_SESSION["user"]["role"] != "LA"){
            $_SESSION["msg"] = "Har ikke tilgang til siden du prøver å gå til";
            header("location: mainPage.php");
            exit;
        }
    ?>
    LA page
</body>
</html>