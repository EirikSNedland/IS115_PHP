<?php
    $hash = password_hash("Cookies123", PASSWORD_DEFAULT);
    echo $hash . "<br>";
    echo password_hash("Cookies123", PASSWORD_DEFAULT);

    if(password_verify("Cookies123",$hash)){
        echo "<p>Passord stemmer NOICE</p>";
    }


    $password = "Cookies123";

    echo "MD5 <br>";

    echo md5($password) . "<br>";
    echo md5($password) . "<br>";

    echo "<br> Password_hash <br>";

    echo password_hash($password, PASSWORD_DEFAULT) . "<br>";
    echo password_hash($password, PASSWORD_DEFAULT);
?>