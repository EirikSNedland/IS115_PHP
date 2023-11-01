<?php 
    //Lage cookies
    setcookie("varehus", "Sørlandsparken",time() + 5184000, "/");

    echo $_COOKIE["varehus"];

    //Slette cookies
    setcookie("varehus", "Sørlandsparken",time() - 5184000, "/");

?>
<p>Hello World</p>