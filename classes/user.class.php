<?php

/**
 *
 */
class User {

    private $m_iId;
    private $m_sEmail;
    private $m_sName;
    private $m_sFirstName;
    private $d_dBirthdate;

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
            default:
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
                $vResult = m_sEmail;
            case "Name" :
                $vResult = m_sName;
            case "FirstName" :
                $vResult = m_sFirstName;
            case "Birthdate" :
                $vResult = m_dBirthdate;
                break;
            default:
                break;
        }

        return $vResult;
    }

}
?>