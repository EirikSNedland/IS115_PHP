<?php 
    class Validate{

        #Oppgave 5 utvidelse part 1

        #Mobilnummer oppfyller ikke samme krav som de andre alternativene, passord kan opnå epost krav
        public static function findTypeOfInput($input){
            
            switch ($input){
                #Antar at input som er godkjent epost er epost og ikke passord
                case self::validateEmail($input) == true:
                    echo "<p>Input er email</p>";
                    break;
                case self::validateMobilNr($input) == true:
                    echo "<p>input er mobilNummer</p>";
                    break;
                default:
                    if (self::validatePassword($input)){
                        echo "<p>Input er av typen passord</p>";
                    } else {
                        echo "<p>Input er ikke en gyldig epostadresse, mobilnummer eller passord</p>";
                    }
                    break;
                }
        }

        #Under er valideringsmetoder

        #Oppgave 4 valideringen, public fordi oppgave fire tilkaller denne
        public static function validateEmail($email){
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                return true; 
            } else {
                return false;
            }
        }

        /* 
        Oppgave 5 utvidelse part 2
        metodene er private siden det bare er findTypeOfInput() som skal bli tilkalt i oppgave 5
        */

        #Krav: Norsk mobilnummer
        private static function validateMobilNr($mobilNr){
            #prepWork
            $mobilNr = str_replace(" ","",$mobilNr);
            #La bruker skrive +47 (landskode Norge) men ingen andre landskoder
            if(str_starts_with($mobilNr,  "+47") ){
                $mobilNr = str_replace("+47","",$mobilNr);
            }

            if (preg_match('/^[0-9]{8}+$/',$mobilNr)){
                return true;
            } else {
                return false;
            }

        }

        #Krav: Minst 2 tall, en stor bokstav, et spesialtegn og minst 9 tegn
        private static function validatePassword($password){
            $validate = true;
            
            $digits = "/\d/"; // \d er spesialtegn som representerer alle tall
            #returnerer antall tall som er i passordet
            $amountOfNumbers = preg_match_all($digits,$password); 
            
            #Alle spesialtegn
            $allSpecialChars = "/[\'^£$%&*()}{@#~?><>,|=_+¬-]/";

            #Sjekker lengde kriteriet
            if(!strlen($password) >= 9){
                $validate = false;
            }

            #Sjekker om antall tall kriteriet er oppfylt
            if ($amountOfNumbers < 2){
                $validate = false;
            }

            #Sjekker om minst en stor bokstav kriteriet er oppfylt, sjekker også om det er minst en liten bokstav
            if(!preg_match('@[A-Z]@', $password) || !preg_match('@[a-z]@',$password)){
                $validate = false;
            }

            #Sjekker om minst et spesial tegn kriteriet er oppfylt
            if (!preg_match($allSpecialChars,$password)){
                $validate = false;
            }

            return $validate;
        }
    }
?>