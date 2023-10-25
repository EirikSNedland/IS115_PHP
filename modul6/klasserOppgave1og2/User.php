<?php 
    /**
     * User klasse til oppgave 1 og 2
     */
    class User{

        public $fName;
        public $lName;
        public $userName;
        public $birthDate;
        public $dateOfRegister;

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
    }
?>