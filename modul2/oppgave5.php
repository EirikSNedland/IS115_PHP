<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 2.5</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <h1>Passord generator</h1>
    <p>Passordet ditt vill bestå av åtte tegn og ha minst en stor bokstav, en liten bokstav og et tall</p>
    
    <form> 
		<input type="submit" name="getPassword" value="Generer Passord"/> 
	</form> 
    <?php 
        function passwordGenerator(){
            $numberList = array(0,1,2,3,4,5,6,7,8,9);
            $bigCharList = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","Æ","Ø","Å");
            $smallCharList = array("a","b","c","d","e","f","g","h","i","j","k","k","m","n","o","p","q","r","s","t","u","v","w","x","y","z","æ","ø","å");
            $charsInPassword = array();
            
            array_push($charsInPassword, $numberList[rand(0,count($numberList) - 1)]);
            array_push($charsInPassword, $bigCharList[rand(0,count($bigCharList) - 1)]);
            array_push($charsInPassword, $smallCharList[rand(0,count($smallCharList) - 1)]);

            for($i = 0; $i <= 5; $i++){
                $randNumb = rand(1,3);
                switch ($randNumb){
                    case 1:
                        array_push($charsInPassword, $numberList[rand(0,count($numberList) - 1)]);
                        break;
                    case 2:
                        array_push($charsInPassword, $bigCharList[rand(0,count($bigCharList) - 1)]);
                        break;
                    case 3:
                        array_push($charsInPassword, $smallCharList[rand(0,count($smallCharList) - 1)]);
                        break;
                }
            }
            $password = "";
            for ($i = 8; !$i == 0; $i--){
                $randomIndex = rand(0,$i-1);
                $password .= $charsInPassword[$randomIndex];
                array_splice($charsInPassword,$randomIndex,1);
            }
            return $password;
        }
        if (isset($_GET['getPassword'])) {
            $password = passwordGenerator();
            echo "<p>Passordet ditt er: <b> $password </b> </p>";
        }
             
    ?>  
</body>
</html>