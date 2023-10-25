<?php 
    include "User.php";

    /**
     * Under klasse av User, Tutor har andre privilegier en vanlige brukere
     */
    class Tutor extends User{
        #Extra privilegier gjelder bare kurs som Tutor er Tutor i
        public $courses;

        public function __construct(){
            $this -> courses = array();
        }
        
        #Overkjører metoden getRole i User
        public function getRole(){
            return "LA";
        }
    }
?>