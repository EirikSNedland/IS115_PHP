<?php 
    function sanetize(string $text){
        $text = strip_tags($text);
        $text = htmlspecialchars($text);
        return $text;
    }
?>