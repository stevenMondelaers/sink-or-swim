<?php
/**
 *
 */
class Database {

    private $m_sHost = "localhost";
    private $m_sUser = "root";
    private $m_sPassword = "";
    private $m_sDatabase = "php_sinkorswim";
    public $link = null;

    function __construct() {
        
    }
    
    function initLink(){
        $this -> link = new mysqli($this -> m_sHost, $this -> m_sUser, $this -> m_sPassword, $this -> m_sDatabase);
    }
    
    function selectUserLogin($p_sEmail, $p_sPassword){
        $email = $this->link->real_escape_string($p_sEmail);
        $password = md5($this->link->real_escape_string($p_sPassword));
        
        $sql = "SELECT * FROM tbluser
                WHERE email = '$email' AND password = '$password';";
        
        $result = $this->link->query($sql);
        
        return mysqli_num_rows($result);
        
    }
    
}

?>