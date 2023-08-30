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
        function countNumbers(int $i){
            global $sum;
            if ($i < 10 ){
                sleep(1);
                echo "$i <br>";
                $sum += $i; 
                $i ++;
                countNumbers($i);
            } else {
                sleep(2);
                echo $sum;
                return $sum;
            }
        }
        countNumbers(0);
    ?>
</body>
</html>