<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 4.1</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php
        $array = array( 0 => "Apple", 3 => "Orange", 5 => "Lemon", 7 => "Lime" , 8 => "Banana", 15 => "Grape");
        print_r($array);
        foreach($array as $item){
            $key = array_search($item, $array);
            echo "<p>verdi $item , ligger på index $key</p>";
        }
    ?>
</body>
</html>