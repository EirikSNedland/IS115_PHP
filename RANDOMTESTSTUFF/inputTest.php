<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 2.4</title>
</head>
<body>
    <a href="../">Go Back</a><br>
    <form>
        Test: <input type="text" name="test">
    </form>
    <br>
    <?php 
        echo $_GET["test"];
    ?>
</body>
</html>