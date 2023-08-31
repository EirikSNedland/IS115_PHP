<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 3.2</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php
        $sum = 0;
        $i = 0;
        while ($i < 10){
            ob_flush();
            flush();
            sleep(1);
            echo "$i <br>";
            $sum += $i; 
            $i ++;
        }
        ob_flush();
        flush();
        sleep(2);
        echo "Sum av alle tallene er $sum";
    ?>
</body>
</html>