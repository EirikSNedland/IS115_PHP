<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modul 4.5</title>
</head>
<body>
    <a href="index.php">Go Back</a><br>
    <?php 
        function sanetize(string $text){
            $text = strip_tags($text);
            $text = htmlentities($text);
            return $text;
        }
        function validateEmail(string $email){
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo "<p class='failure'>Ugyldig epost adresse</p>";
                return false;
            } else{
                return true;
            }
        }
    ?>
    <form method="post">
        <label for="email"> Epost 
            <input type="email" name="email" required>
        </label>
        <label for="name"> Skriv inn ditt navn:
            <input type="text" name="name" required>
        </label>
        <label for="emnetitle"> Emnetitel
            <input type="text" name="emnetitle" required>
        </label>
        <label for="messege"> Melding
            <textarea name="messege" cols="30" rows="10" required></textarea>
        </label>
        <label for="submit">
            <input type="submit" name="submit" value="send">
        </label>
    </form>
    <?php
        if(isset($_POST["submit"])){
            $email = sanetize($_POST["email"]);
            if(validateEmail($email)){
                $email = sanetize($_POST["email"]);
                $name = sanetize($_POST["name"]);
                $emtitle = sanetize($_POST["emnetitle"]);
                $messege = sanetize($_POST["messege"]);
                echo "<p> From: 
                    <b>$name</b><br>
                    <i>$email</i>
                    <h4>$emtitle</h4>
                    $messege</p>";
            } else {
                echo "<p class='failure'> Noe gikk gale, prøv på nytt</p>";
            }
        }
    ?>
</body>
</html>