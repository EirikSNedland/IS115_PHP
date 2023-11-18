<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="katalog/style.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Modul 9.3</title>
</head>
<body>
    <a href="index.php">Go Back</a><br> 
    <?php 
    require("Logger.php");
    $event = "Side oppgave 3 lastet inn";
    loggEvent($event);

    session_start();
    $msgArray = array();

    #logget inn som Espen Askeladden
    $_SESSION["user"]["fname"] = "Espen";
    $_SESSION["user"]["lname"] = "Askeladden";
    $_SESSION["user"]["email"] = "epsen@askeladden.moc";
    $_SESSION["user"]["mobil"] = "+47 123 45 678";
    $_SESSION["user"]["profilePic"] = null;
    ?>
    <h1>PROFIL</h1>
    <form>
        <div class="form-group">
            <label for="fname"></label>
            <input type="text" name="fname" readonly value="<?php echo $_SESSION["user"]["fname"] ?>">
        </div>

        <div class="form-group">
            <label for="lname"></label>
            <input type="text" name="lname" readonly value="<?php echo $_SESSION["user"]["lname"] ?>">
        </div>

        <div class="form-group">
            <label for="email"></label>
            <input type="text" name="email" readonly value="<?php echo $_SESSION["user"]["email"] ?>">
        </div>

        <label for="mobil"></label>
        <input type="text" name="mobil" readonly value="<?php echo $_SESSION["user"]["mobil"] ?>">
    </form>

    <?php 
        if(isset($_POST["upload"])){
            if(is_uploaded_file($_FILES["profilePicture"]["tmp_name"])){
                $allowedFileTypes = array("jpg" => "image/jpeg", "png" => "image/png");
                $maxFileSize = 2097152; //2MB i bytes
                $folder = "./katalog/profilBilder/";

                $fileType = $_FILES["profilePicture"]["type"];
                $fileSize = $_FILES["profilePicture"]["size"];

                #Sjekker om godkjent filtype
                if(!in_array($fileType, $allowedFileTypes)){
                    $msgArray[] = "Ugyldig fil type";
                }

                #sjekker om godkjent fil størrelse
                if($fileSize > $maxFileSize){
                    $msgArray[] = "Filen er for stor";
                }

                if(empty($msgArray)){
                    $suffix = array_search($fileType,$allowedFileTypes);
                    $fileName = "pp." . $suffix;

                    #While løkken skal sikkre at ingen filer blir erstattet av ny fil
                    while (file_exists($folder . $fileName)){
                        $fileName = "pp_" . date("YmdHis") . "." . $suffix;
                    }

                    #UploadedFile vil bli enten TRUE når vellyket eller FALSE hvis noe gikk gale
                    $uploadedFile = move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $folder . $fileName);

                    if ($uploadedFile){
                        $msgArray[] = "Gratulerer med nytt profilbilde";
                        $_SESSION["user"]["profilePic"] = $fileName;
                        loggEvent("Nytt profilbilde lastet opp");
                    } else{
                        $msgArray[] = "Noe gikk gale, nytt profilbilde ble ikke lastet opp";
                        loggEvent("Error: Nytt profilbilde ikke lastet opp");
                    }

                }
            } else {
                $msgArray[] = "Ingen fil funnet";
            }
        }
    ?>
    <!--img skal bruke default bilde hvis bruker ikke har profilbilde-->
    <img id="profilePicture" alt="Profile bilde" src="<?php 
    if($_SESSION["user"]["profilePic"] === null){
        #Placeholder profil bilde
        echo "./katalog/profilBilder/pp.jpg";
    } else {
        echo "./katalog/profilBilder/" .  $_SESSION["user"]["profilePic"];
    }
    ?>" height="100px" width="100px">

    <form method="post" action=" <?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="profilePicture">Last opp profilbilde</label>
            <input type="file" name="profilePicture">
        </div>
        <div class="form-group">
            <input type="submit" name="upload" value="Last opp">
        </div>
    </form>
    <p>
        <?php
            if(!empty($msgArray) ){
                foreach($msgArray as $msg){
                    echo $msg . "<br>";
                }
            }
        ?>
    </p>
    <script>
    /*For å forhindre at at refreshing av siden submiter upload uten at knappp klikkes
        og at det blir uendelig mange like bilder med ulik filnavn
        refreshing av side vil nå 'lage' ny bruker uten profilbilde
    */
    if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
</script>
</body>
</html>