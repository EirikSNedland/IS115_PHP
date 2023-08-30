<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 3.5</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <p>Sjakkbrett med 64 ruter, rute en har 1 hvetekorn, antall hvete korn skal dobbles per rute så rute 2 har 2hvetekorn, rute 3 har 4hvetekorn osv...</p>
    <p>Vekt av total antall hvetekorn skal skrives ut i antall tonn, hvert hvetekorn veier 0,035 gram </p>
    <?php
        $sumPerRute = 0;
        $totalSum = 0;

        for ($i = 1; $i<65;$i++){
            if ($sumPerRute == 0){
                $sumPerRute += 1;
                $totalSum += $sumPerRute;
                echo "<p>Rute $i har <b>$sumPerRute</b> hvetekorn</p>";
                //echo $totalSum; 
            } else{
                $sumPerRute = $sumPerRute * 2;
                $totalSum += $sumPerRute;
                echo "<p>Rute $i har <b>$sumPerRute</b> hvetekorn</p>";
                //echo $totalSum;
            }
        }
        //echo "<p>$totalSum</p>";
        $totalTonn = ($totalSum * 0.035) / 1000000 ; //1 000 000 gram = 1 tonn 

        echo "<p>Total vekt på totalt antall hvetekorn er <b>$totalTonn</b> tonn</p>";
    ?>
</body>
</html>