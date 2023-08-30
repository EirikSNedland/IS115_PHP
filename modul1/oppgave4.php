<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Go Back</a> <br>
    <?php
    function sumAndAverage($tall1, $tall2){
        $sum = $tall1 + $tall2;
        $gjennomsnitt = $sum / 2;
        echo "<p>tall1 er $tall1  og tall2 er $tall2</p>";
        echo "<p>tall1 summert med tall2 er $sum og gjennomsnitet av disse tallene er $gjennomsnitt </p>";
    }
    sumAndAverage(5,17);
    ?>
</body>
</html>