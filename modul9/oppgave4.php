<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="katalog/style.css">
    <title>Modul 9.4</title>
</head>
<body>
    <a href="index.php">Go Back</a><br> 
    <form>
    <ul>
        <li><a href="oppgave4.php?file=lastMegNed.pdf">Last Meg Ned</a></li>
        <li><a href="oppgave4.php?file=pannekake.pdf">pannekake</a></li>
        <li><a href="oppgave4.php?file=Innlevering9_fakturamal.pdf">faktura mal</a></li>
    </ul>
    </form>
    <?php 
        require("Logger.php");
        $event = "Side oppgave 4 lastet inn";
        loggEvent($event);

        if(isset($_GET["file"])){
            $fileToDownload = $_GET["file"];
            $filePath = "./katalog/ignoreMe/" . sanitize($fileToDownload);

            if(file_exists($filePath)){
                header("Content-Description: File Transfer"); //Siden skal overføre en fil
                header("Content-Type: application/pdf"); //Fil type pdf
                header("Content-Length: " . filesize($filePath)); //Git beskjed om fil størrelse
                header("Content-Transfer-Encoding: Binary"); //FIl skal behandkles som binar data
                header("Content-Disposition: attachment; filename=\"" . $_GET["file"] ."\" "); 
                header("Pragma: public"); //brukes for a cache filen på klient siden

                #Sender fil tik klient som en stream
                readfile($filePath);

                #Random logg event go!
                loggEvent("Bruker lastet ned " . $fileToDownload);

                exit;
            } else {
                loggEvent("Error: Bruker fikk ikke lastet ned fil");
                echo "Fant ikke fil";
            }
        }
    ?>


<?php 
    function sanitize(string $text){
        $text = strip_tags($text);
        $text = htmlspecialchars($text);
        return $text;
    }
?>
</body>
</html>