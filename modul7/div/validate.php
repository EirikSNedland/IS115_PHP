<?php 
    function sanetize(string $text){
        $text = strip_tags($text);
        $text = htmlspecialchars($text);
        return $text;
    }

    function validateText(string $text){
        if(preg_match('@[0-9]@', $text) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $text)){
            return false;
        } else{
            return true;
        }
    }

    function validateMobileNr(string $mobilNr){
        if (preg_match('/^[0-9]{8}+$/',$mobilNr)){
            return true;
        } else{
            return false;
        }
    }
    
    function validatePassword(string $password){
        //har ikke alle if setningene i en if,elseif,elsif... for å få alle feilmeldingene med en gang
        $validated = true;
        if(strlen($password) <= 7 ){
            $validated = false;
        }
        if(!preg_match('@[A-Z]@', $password) || !preg_match('@[a-z]@', $password) || !preg_match('@[0-9]@',$password)){
            $validated = false;
        }
        return $validated;
    }

    function validateUserReg($array){
        $validated = true;
        if (!validateText($array["fname"]) ){
            echo "<p class='failure'>Fornavn inneholder ikke godkjent tegn som tall og spesialtegn</p>";
            $validated = false;
        }

        if (!validateText($array["lname"])){
            echo "<p class='failure'>Etternavn inneholder ikke godkjent tegn som tall og spesialtegn</p>";
            $validated = false;
        }

        if(!validateMobileNr($array["mobil"])){
            echo "<p class='failure'>Mobil nummer er ikke et gyldig nummer, må ha 8 siffer</p>";
            $validated = false;
        }

        if(!filter_var($array["email"],FILTER_VALIDATE_EMAIL)){
            echo "<p class='failure'>Ugyldig epost adresse</p>";
            $validated = false;
        }

        if(!validatePassword($array["password"])){
            if(strlen($array["password"]) < 8){
                echo "<p class='failure'>Passord må inneholde minst 8 tegn</p>";
            }
            if(!preg_match('@[A-Z]@', $array["password"]) || !preg_match('@[a-z]@', $array["password"]) || !preg_match('@[0-9]@',$array["password"])){
                echo "<p class='failure'>Passord må inneholde minst en liten bokstav, en stor bokstav og et tall</p>";
            }
            $validated = false;
        }

        return $validated;
    }
?>