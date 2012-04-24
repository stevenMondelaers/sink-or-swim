<?php
/**
 *
 */
class Database {

    private $m_sHost = "localhost";
    private $m_sUser = "root";
    private $m_sPassword = "";
    private $m_sDatabase = "php_project";
    private $link = null;

    function __construct() {
        $this -> link = new mysqli($this -> m_sHost, $this -> m_sUser, $this -> m_sUser, $this -> m_sDatabase);
    }
    
    function selectUserLogin($p_sEmail, $p_sPassword){
        $email = $link->real_escape_string($p_sEmail);
        $password = md5($link->real_escape_string($p_sPassword));
        
        $sql = "SELECT * FROM tblSwimmer
                WHERE email = $email AND password = $password";
                
        $result = $link->query($sql);
        
    }
    
}

?>