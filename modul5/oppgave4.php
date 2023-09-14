<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Oppgave 5.4</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    
    <?php
    //Hensikt med key: blir hex konvertert til tekst vil ikke de uten key vite hva som står der
     $key = 9;

     //Functions:
        //Krypterer og dekrypterer basert på Cæsar cipher
        function encryptText(string $text,int $key){ //tar ukryptert tekst som input
            $arr = array();
            //for hver char i text skal konverteres til byte
            for($i = 0; $i < strlen($text); $i++){
                // plusser på en verdi på byten for å endre byten
                $byte = ord($text[$i]) +  $key; 
                //byes kan ikke være større en 255
                if($byte > 255){ 
                    //byte 256 skal bli 0, 257 -> 1 osv....
                    $byte = $byte - 256; 
                }
               array_push($arr,$byte);
            }
            $newStr = "";
            //Gjør endret bytes om til chars igjen
            foreach($arr as $element){ 
                $newStr .= chr($element);
            }
            //Gjør binary om til hex
            return bin2hex($newStr); 
        }

        function decryptText(string $text,int $key){ //tar kryptert tekst som input
            $arr = array();
            //gjør hex til binary igjen
            $text = hex2bin($text);
            for($i = 0; $i < strlen($text); $i++){
                $byte = ord($text[$i]) -  $key;
                //Hvis $bytes kan ikke være lavere en 255
                if($byte < 0){ 
                    //-1 regnes som 255, -2 = 254 osv...
                    $byte = $byte + 256;
                }
               array_push($arr,$byte);
            }
            $newStr = "";
            foreach($arr as $element){
                $newStr .= chr($element);
            }
            return $newStr;
        }
    ?>
    <h2>Kryptering</h2>
    <form method="post">
        <label for="text">
            <input name="textToEncrypt" type="text">
        </label>
        <label for="encrypt">
            <input type="submit" name="encrypt" value="Krypter">
        </label>
    </form>
    <?php
        //sjekker om "encrypt" eksisterer, vil eksistere hvis knapp har blit klikket
        if(isset($_POST["encrypt"])){
            echo encryptText($_POST["textToEncrypt"], $key);
        }
    ?>
    <h2>Dekryptering</h2>
    <form method="post">
        <label for="text">
            <input name="textToDecrypt" type="text" 
                <?php
                     if(isset($_POST["encrypt"])){ //For å få den krypterte teksten direkte inn i decrypt input, for å gjøre livet enkeler ved testing
                        echo "value='".encryptText($_POST["textToEncrypt"], $key)."'";
                    }
                ?>>
        </label>
        <label for="decrypt">
            <input type="submit" name="decrypt" value="Dekrypter">
        </label>
    </form>
    <?php
        //sjekker om decrypt eksisterer(har blitt klikket)
        if(isset($_POST["decrypt"])){
            echo decryptText($_POST["textToDecrypt"], $key);
        }
    ?>
</body>
</html>