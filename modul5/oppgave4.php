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
     $key = 9;
        //Krypterer og dekrypterer basert på Cæsar cipher
        function encryptText(string $text,int $key){ //tar ukryptert tekst som input
            $arr = array();
            for($i = 0; $i < strlen($text); $i++){
                //Gjør hver char i string til en byte, plusser på en verdi på byten for å gendre byten
                $byte = ord($text[$i]) +  $key; 
                //sjekker om byte er større en maks størrelse på byte (0->255 aksetabelt byte verdi rekkevide)
                if($byte > 255){ 
                    $byte = $byte - 255; //Eksempel hvis byte har en verdi 256 så vil byte bli gjort om til 1 istedenfor
                }
               array_push($arr,$byte);
            }
            $newStr = "";
            //Gjør endret bytes om til chars igjen
            foreach($arr as $element){ 
                $newStr .= chr($element);
            }
            return $newStr; 
        }

        function decryptText(string $text,int $key){ //tar kryptert tekst som input
            $arr = array();
            for($i = 0; $i < strlen($text); $i++){
                $byte = ord($text[$i]) -  $key;
                //Hvis $bytes er lavere en 0 (ute av listen) vil de bli 255 - nummer under null for å bli innenfor gyldig verdi rekevidde for bytes (0->255)
                if($byte < 0){ 
                    $byte = $byte + 255;
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
        //skrive ut kryptert tekst når knapp klikkes

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
        //skrive dekryptert tekst når knapp klikkes
        if(isset($_POST["decrypt"])){
            echo decryptText($_POST["textToDecrypt"], $key);
        }
    ?>
</body>
</html>