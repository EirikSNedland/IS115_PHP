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
        <select name="fileToDownload">
            <option value="lastMegNed.pdf">lastMegNed</option>
            <option value="pannekake.pdf">pannekake</option>
            <option value="Innlevering9_fakturamal.pdf">faktura mal</option>

        </select>
        <input type="submit" name="download" value="Last ned PDF">
    </form>
    <?php 
        if(isset($_GET["download"])){
            $filePath = "./katalog/ignoreMe/" . sanetize($_GET["fileToDownload"]);
            echo $filePath;
            if(file_exists($filePath)){
                echo "<br>fant fil<br>";
                header("Content-Description: File Transfer");
                header("Content-Type: application/pdf");
                header("Content-Length: " . filesize($filePath));
                header("Content-Transfer-Encoding: Binary");
                #Bruker $_GET["fileToDownload"] istedenfor $filePath for at navnet til filen ikke skal si hvor den er lagret
                header("Content-Disposition: attachment; filename=\"" . $_GET["fileToDownload"] ."\" "); 
                header("Pragma: public");

                readfile($filePath);
            } else {
                echo "Noe gikk gale";
            }
        }
    ?>


<?php 
    function sanetize(string $text){
        $text = strip_tags($text);
        $text = htmlspecialchars($text);
        return $text;
    }
?>
</body>
</html>