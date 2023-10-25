<?php 
        /**
     * User klasse til oppgave 3
     */
    class User{
        
        public $fName;
        public $lName;
        protected $userName;
        public $birthDate;
        protected $dateOfRegister;

        static public $arrayDeletedUsernames = array();


        public function __construct(){
            $this -> userName = $this -> getRandomUsername();
            $this -> dateOfRegister = date("Y-m-d");
        }

        protected function getRandomUsername(){
            $stringOfChars = "a b c d e f g h i j k l m n o p q r s t u v w x y z";
            $arrayOfChars = explode(" ", $stringOfChars);
            $userName = "";

            for ($i = 0; $i < rand(4,8); $i++){
                $userName.= $arrayOfChars[rand(0,count($arrayOfChars) - 1)];
            }
            return ucfirst($userName);
        }

        #metode for å hente fut navn
        public function getFullName(){
            $name = $this -> fName . " " .  $this -> lName;
            return $name;
        }

        #metode for å få info om bruker
        public function printAllUserInfo(){
            echo "Fornavn: " . $this -> fName . "<br>";
            echo "Etternavn: " . $this -> lName . "<br>";
            echo "Brukernavn: " . $this -> userName . "<br>";
            echo "Fødselsdato: " . $this -> birthDate . "<br>";
            echo "Registrerings dato: " . $this -> dateOfRegister . "<br>";
        }

        public function getRole(){
            return "Student";
        }

        public static function printArrayDeletedUsernames(){
            if (count(User::$arrayDeletedUsernames) > 0){
                echo "<p>Navn til slettet brukere: <ul>";
                foreach (User::$arrayDeletedUsernames as $deletedUserName){
                    echo "<li>" . $deletedUserName . "</li>";
                }
                echo "</ul> </p>";
            } else{
                echo "Ingen brukere har blitt slettet enda";
            }
        }

        public function __destruct(){
            array_push(self::$arrayDeletedUsernames, $this -> userName);
        }
    }
?>