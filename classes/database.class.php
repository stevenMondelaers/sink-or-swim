<?php
/**
 *
 */
class Database {

    private $m_sHost = "localhost";
    private $m_sUser = "root";
    private $m_sPassword = "";
    private $m_sDatabase = "php_project";
    public $link = null;

    function __construct() {
        $this -> link = new mysqli($this -> m_sHost, $this -> m_sUser, $this -> m_sPassword, $this -> m_sDatabase);
    }
    
    function selectUserLogin($p_sEmail, $p_sPassword){
        $email = $this->link->real_escape_string($p_sEmail);
        $password = md5($this->link->real_escape_string($p_sPassword));
        
        
        $sql = "SELECT * FROM zwemmer
                WHERE email = '$email' AND Wachtwoord = '$password';";
        
        $result = $this->link->query($sql);
        
        if($result ->num_rows == 1){
            return $result->fetch_row();    
        }else {
            throw new Exception("Faulty login credentials", 1);
            
        }
        
        //return $result->num_rows;
        
    }
    
}

?>