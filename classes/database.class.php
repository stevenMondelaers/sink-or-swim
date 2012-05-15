<?php
/**
 *
 * Deze klasse handelt alle sql queries af
 *
 */
class Database {

    private $m_sHost = "localhost";
    private $m_sUser = "root";
    private $m_sPassword = "";
    private $m_sDatabase = "p99_project";
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
            throw new Exception("Faulty login credentials", 1);
        }
    }

    public function registerUser($name, $firstName, $sex, $email, $password, $birthDate, $licenseNumber) {

        $name = $this -> link -> real_escape_string($name);
        $firstName = $this -> link -> real_escape_string($firstName);
        $sex = $this -> link -> real_escape_string($sex);
        $email = $this -> link -> real_escape_string($email);
        $password = md5($password);
        $birthDate = $this -> link -> real_escape_string($birthDate);
        $licenseNumber = $this -> link -> real_escape_string($licenseNumber);

        $sql = "INSERT INTO zwemmer (Naam, Voornaam, Geslacht, Email, Wachtwoord, Geboortedatum, Licentienummer)
                VALUES ('$name', '$firstName', '$sex', '$email', '$password', '$birthDate', '$licenseNumber');";

        $this -> link -> query($sql);
    }

    public function selectPersonalRankings($id) {
        $sql = "SELECT Tijd, wedstrijd.`Datum`, wedstrijd.`Plaats`, `ZwemmerID`
                FROM resultaat
                LEFT JOIN wedstrijd
                ON resultaat.`WedstrijdID` = wedstrijd.`WedstrijdID`
                WHERE `ZwemmerID` = " . $id."
                ORDER BY tijd ASC";

        return $this -> link -> query($sql);
    }
	
	public function getAllSwimmer(){
		$sql = "SELECT * FROM zwemmer order by 2";
		return $this -> link -> query($sql);
	}

}
?>