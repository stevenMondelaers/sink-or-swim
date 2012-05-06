<?php

/*
 * Deze klasse behandelt de logica die met gebruikers te maken heeft
 * inloggen, registreren, ...
 * */
 
class User {

    private $m_iId;
    private $m_sName;
    private $m_sFirstName;
    private $m_sEmail;
    private $m_dBirthdate;
    private $m_sLicenseNumber;
    private $m_sPassword;
    private $m_sPasswordConfirm;

    public function __set($p_sProperty, $p_vValue) {
        switch($p_sProperty) {
            case "Id" :
                $this -> m_iId = $p_vValue;
                break;
            case "Email" :
                $this -> m_sEmail = $p_vValue;
            case "Name" :
                $this -> m_sName = $p_vValue;
            case "FirstName" :
                $this -> m_sFirstName = $p_vValue;
            case "Birthdate" :
                $this -> m_dBirthdate = $p_vValue;
                break;
            case "LicenseNumber" :
                $this -> m_sLicenseNumber = $p_vValue;
            case "Password" :
                $this -> m_sPassword = $p_vValue;
            case "PasswordConfirm" :
                $this -> m_sPasswordConfirm = $p_vValue;
            default :
                break;
        }
    }

    public function __get($p_sProperty) {
        $vResult = null;

        switch($p_sProperty) {
            case "Id" :
                $vResult = $this -> m_iId;
                break;
            case "Email" :
                $vResult = $this -> m_sEmail;
            case "Name" :
                $vResult = $this -> m_sName;
            case "FirstName" :
                $vResult = $this -> m_sFirstName;
            case "Birthdate" :
                $vResult = $this -> m_dBirthdate;
                break;
            case "LicenseNumber" :
                $vResult = $this -> m_sLicenseNumber;
            case "Password" :
                $vResult = $this -> m_sPassword;
            case "PasswordConfirm" :
                $vResult = $this -> m_sPasswordConfirm;
            default :
                break;
        }

        return $vResult;
    }
    
    public function logIn($p_sEmail, $p_sPassword) {
        include_once ('classes/database.class.php');
        $db = new Database();

        try {
            $sqlResult = $db -> selectUserLogin($p_sEmail, $p_sPassword);
            $_SESSION['userId'] = $sqlResult[0];
            $_SESSION['userName'] = $sqlResult[1];
            $_SESSION['userFirstName'] = $sqlResult[2];
            $_SESSION['userEmail'] = $sqlResult[3];
            $_SESSION['userBirthDate'] = $sqlResult[5];
            $_SESSION['userLicenseNumber'] = $sqlResult[6];
            print_r($_SESSION);
            header("Location: ./");
        } catch(exception $e) {
            echo "Something went wrong";
        }
    }
    
    public function register(){
        require_once 'classes/database.class.php';
        
        $db = new Database();
        $db -> registerUser($this->m_sName, $this->m_sFirstName, $this->m_sEmail, $this->m_sPassword, $this->m_dBirthdate, $this->m_sLicenseNumber);
        
        
        
        
    }

}
?>