<?php
    $alder = 18;
    if($alder >  18){
        echo "Gammal";
    } elseif($alder == 18) {
        echo "18 år";
    } else{
        echo "Yngre en 18 år";
    }

    if(isset($alder)){
        echo "<p>Variabel er sat</p>";
    }
?>

<?php 
    $rolle = "hjelpelærer";
    switch ($rolle){
        case "hjelpelærer":
            echo "LA";
            break;
        case ("student"):
            echo "Jobb på ASKO";
            break;
        default:
            echo "Du er sikkert ikke en student eller LA, ka e du?";
    }
?>
<br>
<?php 
    $bransje = "IT";

    $returVerid = match(is_string($bransje)){
        "IT", "informasjonssystemer" => "Her får du se ledige stillinger innenfor IT og informasjonssystemer",
        "jus","juss" => "Her er juss stillinger",
        "detaljhandel" => "Ledige stillinger innenfor detaljehandel",
        true => "Du har opgpgitt oppgitt bransje som tekststreng NICE",
        default => "Du gjorde noe feil ditt esel",
    };
    echo $returVerid;
?>