<?php


class Account {
    private $con;
    private $errorArray = array();

    public function __construct($con) {
        $this->con = $con;
    }

    public function register($fn, $ln, $un, $em, $ce, $pw, $cpw) {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateLastName($un);
        $this->validateLastName($un);
    }

    private function validateFirstName($fn) {
        if(strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }

    private function validateLastName($ln) {
        if(strlen($ln) < 2 || strlen($ln) > 25) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
        }
    }

    private function validateUsername($un) {
        if(strlen($un) < 2 || strlen($un) > 25) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
        $query->bindValue(":un", $un);

        $query->execute();

        if($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
        }
    }

    public function getError($error) {
        if(in_array($error, $this->errorArray)) {
            return $error;
        }
    }
}

?>