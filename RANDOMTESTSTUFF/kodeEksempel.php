<?php 
    $str = "Web Database Applications with PHP and MySQL: Building Effective Database-Driven Web Sites";
    $len =  strlen($str);
    echo "<p>Setningen består av $len tegn</p>";
    $pos = strpos($str,":");
    echo "<p>Kolonnet befinner seg på plass $pos</p>";
    echo "<p>" . ucfirst(strtolower($str)) . "</p>";
    echo "Setningen består av ". str_word_count($str) . " ord</p>";

    echo md5($str) ."<br>";
    echo rand(1,100) ."<br>";
    echo substr(md5($str),rand(0,10),5);
?>
<br><br>
<p>
<?php
    $song = "Father";
    $cryptSong = md5($song);
    $lastCharInSong = substr($cryptSong,-4);
    echo $cryptSong. "<br>";
    echo $lastCharInSong . "<br>";
    echo arealCircle(5);

    //areal sirkel pi * r^2
    function arealCircle(int $radius){
        return round($radius**2 * pi(),2);
    }
?>
</p>
<p>
    <?php
        echo date("l",time()-86400) ."<br>";
        echo date("d-m-Y H:i:s") . "<br>";
        echo date("l",strtotime("2000-09-04"));
        echo date("l",mktime(0,0,0,9,4,2000));
    ?>
</p>