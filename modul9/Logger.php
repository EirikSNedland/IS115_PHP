<?php
$folder = "./katalog/";
function loggEvent($event){
    global $folder;
    if(file_exists($folder . "log.txt")){
        $file =  fopen($folder . "log.txt", "a+") or die("Kunne ikke åpne log fil");
        $text = "<p>Log: " . date("d.m.Y H:i") . "<br> hendelse: " . $event . "</p> \n";
        #skriver innhold til slutten av filen
        fwrite($file, $text);
        fclose($file);
    } else {
        echo "fil eksisterer ikke";
    }
}
?>