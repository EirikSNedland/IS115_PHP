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
    <p>Hvis listen inneholder mindre en 10 log eventer har du ikke besøkt nok sider <br>
        Loggen vil fylle seg opp etterhvert som oppgavene blir godt igjenom. <br>
        Alle handlinger i fra å laste inn sider til laste ned dokument vil generere <br>
        ny logg item.
    </p>
    <?php 
        require("Logger.php");
        $event = "Side oppgave 2 lastet inn";
        loggEvent($event);

        global $folder;
        if(file_exists($folder . "log.txt")){
            $fileContent = file($folder . "log.txt");
            $lastTenEntries = array_slice($fileContent, -10);

            #skriver ut de ti siste events fra logg
            foreach ($lastTenEntries as $entry){
                echo  $entry;
            }

            
         } else {
             echo "fil eksisterer ikke";
         }
    ?>
</body>
</html>