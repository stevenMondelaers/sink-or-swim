<?php
/**
 *
 * Deze klasse handelt alle sql queries af
 *
 */
class Database {

    private $m_sHost = "localhost";
    private $m_sUser = "root";
    private $m_sPassword = "root";
    private $m_sDatabase = "php_project";
    public $link = null;

    function __construct() {
        $this -> link = new mysqli($this -> m_sHost, $this -> m_sUser, $this -> m_sPassword, $this -> m_sDatabase);
    }

    public function selectUserLogin($p_sEmail, $p_sPassword) {
        $email = $this -> link -> real_escape_string($p_sEmail);
        $password = md5($this -> link -> real_escape_string($p_sPassword));

        $sql = "SELECT * FROM zwemmer
                WHERE email = '$email' AND Wachtwoord = '$password';";

        $result = $this -> link -> query($sql);

        if ($result -> num_rows == 1) {
            return $result -> fetch_row();
        } else {
<<<<<<< HEAD
            throw new Exception($sql, 1);
            //throw new Exception("Faulty login credentials", 1);
=======
        	throw new Exception("Please check your email address and/or password", 1);
>>>>>>> 2b98d1379070e1f33af828803b08d0b42c6711d4
        }
    }

    public function registerUser($name, $firstName, $email, $password, $birthDate, $licenseNumber) {

        $name = $this -> link -> real_escape_string($name);
        $firstName = $this -> link -> real_escape_string($firstName);
        $email = $this -> link -> real_escape_string($email);
        $password = md5($password);
        $birthDate = $this -> link -> real_escape_string($birthDate);
        $licenseNumber = $this -> link -> real_escape_string($licenseNumber);

        $sql = "INSERT INTO zwemmer (Naam, Voornaam, Email, Wachtwoord, Geboortedatum, Licentienummer)
                VALUES ('$name', '$firstName', '$email', '$password', '$birthDate', '$licenseNumber');";

        $this -> link -> query($sql);
    }

    public function selectPersonalRankings($id, $afstand) {
        $afstand = $afstand;

        $sql = "SELECT Tijd, wedstrijd.`Datum`, wedstrijd.`Plaats`, `ZwemmerID`
                FROM resultaat
                LEFT JOIN wedstrijd
                ON resultaat.`WedstrijdID` = wedstrijd.`WedstrijdID`
                WHERE `ZwemmerID` = " . $id . " AND `AfstandID` = " . $this -> link -> real_escape_string($afstand) . "
                ORDER BY tijd ASC";

        return $this -> link -> query($sql);
    }
	
	public function selectDistances() {
        $sql = "SELECT * FROM afstand";

        return $this -> link -> query($sql);
    }

    public function selectDistances() {
        $sql = "SELECT * FROM afstand";

        return $this -> link -> query($sql);
    }

}
?>