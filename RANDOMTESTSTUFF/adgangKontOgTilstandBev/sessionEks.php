<?php 
    $verdi = "M128A75U7S";

    session_start();
    $_SESSION["navn"] = "CookieMonster";
    $_SESSION["id"] = 1234567890;
    $_SESSION["bruker"]["id"] = $verdi;
    $_SESSION["userid"] = "MEJET262GERAR";

    //echo $_SESSION["bruker"]["id"];

    //unset($_SESSION["navn"]);
    //unset($_SESSION["bruker"]["id"]);

    //session_destroy();

    print_r($_SESSION)
?>