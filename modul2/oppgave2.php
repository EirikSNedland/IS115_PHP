<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 2.2</title>
</head>
<body>
    <a href="index.php">Go Back</a><br> 
    <form method="get">
        <input type="submit" name="unsanetized" value="vis uvasket version">
        <input type="submit" name="sanetized" value="vis vasket version">
    </form>
    <?php 
        $etternavn = "<h1>LarsGunnar</h1>";
        $sanitized_etternavn = sanetize($etternavn);

        function sanetize($text){
            $text = strip_tags($text);
            $text = htmlentities($text);
            return $text;
        }

        if(isset($_GET["unsanetized"])){
            echo "<p>Unsanetized: $etternavn</p>";
        }
        if(isset($_GET["sanetized"])){
            echo "<p>Sanetized: $sanitized_etternavn</p>";
        }
    ?>
</body>
</html>