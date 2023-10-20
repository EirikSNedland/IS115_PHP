<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Oppgave 5.5</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <h1>Celsuis/Farenheit Converter</h1>

    <?php 
        $celsius = 0; 
        $farenheit = 32;
        /**
         * gjør celsius til farenheit basert på formel: Formel: °F = (℃ × 9/5) + 32
         * Link formel: https://no.wikipedia.org/wiki/Grad_fahrenheit
         * 
         * @param int $celsius 
         * 
         * @return int farenheit
         */
        function celsToFaren($celsius){
            return ($celsius * 9/5) + 32;
        }

        /**
         * gjør celsius til farenheit basert på formel: Formel: ℃ = (°F − 32) × 5/9
         * Link formel: https://no.wikipedia.org/wiki/Grad_fahrenheit
         * 
         * @param int $farenheit
         * 
         * @return int celsius
         */
        function farenToCels(int $farenheit){
            return ($farenheit - 32) * 5/9;
        }

        #basert på radio button valg bestemmer applikasjonen hvilken funksjon som skal brueks
        if(isset($_POST["convert"])){
            switch($_POST["whatToConvert"]){
                case "celsToFaren":
                    $celsius = $_POST["celsius"];
                    $farenheit = celsToFaren($celsius);
                    break;
                case "farenToCels":
                    $farenheit = $_POST["farenheit"];
                    $celsius = farenToCels($farenheit);
                    break;
            }
        }
    ?>

    <form method="post">
        <fieldset>
            <h3>Velg et alternativ</h3>
            <label for="choice1"> Celsius til Farenheit:
                <input type="radio" id="choice1" name="whatToConvert" value="celsToFaren" required>
            </label>
            <label for="choice2">Farenheit til Celsius:
                <input type="radio" id="choice2" name="whatToConvert" value="farenToCels" required>
            </label>
        </fieldset>
        <label for="celsius">Celsius:
            <input type="number" name="celsius" <?php echo "value='$celsius'" ?>>
        </label>
        <label for="farenheit">Farenheit:
            <input type="number" name="farenheit" <?php echo "value='$farenheit'" ?>>
        </label>
        <label for="convert">
            <input type="submit" name="convert" value="Konverter">
        </label>
    </form>
</body>
</html>