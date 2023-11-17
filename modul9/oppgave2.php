<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="katalog/style.css">
    <title>Modul 9.2</title>
</head>
<body>
    <a href="index.php">Go Back</a><br> 
    <?php
        $folder = "./katalog/";
        $pointer = opendir($folder);
        if(isset($_POST["submit"])){
            if(file_exists($folder . "log.txt")){
               $file =  fopen($folder . "log.txt", "a+") or die("Kunne ikke åpne log fil");
               $text = "<p>Log: " . date("d.m.Y H:i") . "<br> hendelse: " . $_POST["event"] . "</p>";
               fwrite($file, $text);
               fclose($file);
            } else {
                echo "fil eksisterer ikke";
            }
        }
    ?>
    <form method="POST">
        <input type="text" name="event">
        <input type="submit" name="submit">
    </form>
    <?php 
        if(file_exists($folder . "log.txt")){
            $file =  fopen($folder . "log.txt", "r") or die("Kunne ikke åpne log fil");
            $fileContent = fread($file,500);
            fclose($file);
            echo $fileContent;
         } else {
             echo "fil eksisterer ikke";
         }
    ?>
</body>
</html>