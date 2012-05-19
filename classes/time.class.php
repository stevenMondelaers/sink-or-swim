<?php

class Time{
	private $m_sCompetition;
	private $m_sDistance;
	
	private $m_iTimeMin;
	private $m_iTimeSec;
	private $m_iTimeHun;
	private $m_iTimeFull;
	
	private $m_iReactionSec;
	private $m_iReactionHun;
	private $m_iReactionFull;

	private $m_iM50Min;
	private $m_iM50Sec;
	private $m_iM50Hun;
	private $m_iM50Full;
	
	private $m_iM100Min;
	private $m_iM100Sec;
	private $m_iM100Hun;
	private $m_iM100Full;
	
	private $m_iM200Min;
	private $m_iM200Sec;
	private $m_iM200Hun;
	private $m_iM200Full;
	
	private $m_iM400Min;
	private $m_iM400Sec;
	private $m_iM400Hun;
	private $m_iM400Full;
	
	private $m_iM800Min;
	private $m_iM800Sec;
	private $m_iM800Hun;
	private $m_iM800Full;
	
	private $m_iM1500Min;
	private $m_iM1500Sec;
	private $m_iM1500Hun;
	private $m_iM1500Full;

	public function __set($p_sProperty, $p_vValue){
		switch($p_sProperty){
			case "Competition" :
				$this -> m_sCompetition = $p_vValue;
				break;
			case "Distance" :
				$this -> m_sDistance = $p_vValue;
				break;
			case "TimeMin" :
				$this -> m_iTimeMin = $p_vValue;
				break;
			case "TimeSec" :
				$this -> m_iTimeSec = $p_vValue;
				break;
			case "TimeHun" :
				$this -> m_iTimeHun = $p_vValue;
				break;
			case "TimeFull" :
				$this -> m_iTimeFull = $p_vValue;
				break;
				
			case "ReactionSec" :
				$this -> m_iReactionSec = $p_vValue;
				break;
			case "ReactionHun" :
				$this-> m_iReactionHun = $p_vValue;
				break;
			case "ReactionFull" :
				$this-> m_iReactionFull = $p_vValue;
				break;
				
			case "M50Min" :
				$this -> m_iM50Min = $p_vValue;
				break;
			case "M50Sec" :
				$this -> m_iM50Sec = $p_vValue;
				break;
			case "M50Hun" :
				$this -> m_iM50Hun = $p_vValue;
				break;
			case "M50Full" :
				$this -> m_iM50Full = $p_vValue;
				break;
				
			case "M100Min" :
				$this -> m_iM100Min = $p_vValue;
				break;
			case "M100Sec" :
				$this -> m_iM100Sec = $p_vValue;
				break;
			case "M100Hun" :
				$this -> m_iM100Hun = $p_vValue;
				break;
			case "M100Full" :
				$this -> m_iM100Full = $p_vValue;
				break;
				
			case "M200Min" :
				$this -> m_iM200Min = $p_vValue;
				break;
			case "M200Sec" :
				$this -> m_iM200Sec = $p_vValue;
				break;
			case "M200Hun" :
				$this -> m_iM200Hun = $p_vValue;
				break;
			case "M200Full" :
				$this -> m_iM200Full = $p_vValue;
				break;
			
			case "M400Min" :
				$this -> m_iM400Min = $p_vValue;
				break;
			case "M400Sec" :
				$this -> m_iM400Sec = $p_vValue;
				break;
			case "M400Hun" :
				$this -> m_iM400Hun = $p_vValue;
				break;
			case "M400Full" :
				$this -> m_iM400Full = $p_vValue;
				break;
				
			case "M800Min" :
				$this -> m_iM800Min = $p_vValue;
				break;
			case "M800Sec" :
				$this -> m_iM800Sec = $p_vValue;
				break;
			case "M800Hun" :
				$this -> m_iM800Hun = $p_vValue;
				break;
			case "M800Full" :
				$this -> m_iM800Full = $p_vValue;
				break;
				
			case "M1500Min" :
				$this -> m_iM1500Min = $p_vValue;
				break;
			case "M1500Sec" :
				$this -> m_iM1500Sec = $p_vValue;
				break;
			case "M1500Hun" :
				$this -> m_iM1500Hun = $p_vValue;
				break;
			case "M1500Full" :
				$this -> m_iM1500Full = $p_vValue;
				break;
			default : 
				break;
		}
	}

	public function __get($p_sProperty){
		$vResult = null;
		switch($p_sProperty) {
			case "Competition" :
                $vResult = $this -> m_sCompetition;
                break;
            case "Distance" :
                $vResult = $this -> m_sDistance;
				break;
            case "TimeMin" :
                $vResult = $this -> m_iTimeMin;
				break;
            case "TimeSec" :
                $vResult = $this -> m_iTimeSec;
				break;
			case "TimeHun" :
				$vResult = $this -> m_iTimeHun;
				break;
			case "TimeFull" :
				$vResult = $this -> m_iTimeFull;
				break;
				
            case "ReactionSec" :
                $vResult = $this -> m_iReactionSec;
                break;
            case "ReactionHun" :
                $vResult = $this -> m_iReactionHun;
				break;
			case "ReactionFull" :
				$vResult = $this -> m_iReactionFull;
				break;
					
            case "M50Min" :
                $vResult = $this -> m_iM50Min;
				break;
            case "M50Sec" :
                $vResult = $this -> m_iM50Sec;
				break;
			case "M50Hun" :
				$vResult = $this -> m_iM50Hun;
				break;
			case "M50Full" :
				$vResult = $this -> m_iM50Full;
				break;
				
			case "M100Min" :
                $vResult = $this -> m_iM50Min;
				break;
            case "M100Sec" :
                $vResult = $this -> m_iM50Sec;
				break;
			case "M100Hun" :
				$vResult = $this -> m_iM50Hun;
				break;
			case "M100Full" :
				$vResult = $this -> m_iM50Full;
				break;
				
			case "M200Min" :
                $vResult = $this -> m_iM50Min;
				break;
            case "M200Sec" :
                $vResult = $this -> m_iM50Sec;
				break;
			case "M200Hun" :
				$vResult = $this -> m_iM50Hun;
				break;
			case "M200Full" :
				$vResult = $this -> m_iM50Full;
				break;
				
			case "M400Min" :
                $vResult = $this -> m_iM50Min;
				break;
            case "M400Sec" :
                $vResult = $this -> m_iM50Sec;
				break;
			case "M400Hun" :
				$vResult = $this -> m_iM50Hun;
				break;
			case "M400Full" :
				$vResult = $this -> m_iM50Full;
				break;
			
			case "M800Min" :
                $vResult = $this -> m_iM50Min;
				break;
            case "M800Sec" :
                $vResult = $this -> m_iM50Sec;
				break;
			case "M800Hun" :
				$vResult = $this -> m_iM50Hun;
				break;
			case "M800Full" :
				$vResult = $this -> m_iM50Full;
				break;
				
			case "M1500Min" :
                $vResult = $this -> m_iM50Min;
				break;
            case "M1500Sec" :
                $vResult = $this -> m_iM50Sec;
				break;
			case "M1500Hun" :
				$vResult = $this -> m_iM50Hun;
				break;
			case "M1500Full" :
				$vResult = $this -> m_iM50Full;
				break;
				
            default :
                break;
		}

		return $vResult;
	}

	public function timeReg(){
		require_once 'classes/database.class.php';
		$db = new Database();
		$db -> registerTime($this->m_sCompetition, $this->m_sDistance, $this->m_iTimeFull, $this->m_iReactionFull, $this->m_iM50Full, $this->m_iM100Full, $this->m_iM200Full, $this->m_iM400Full, $this->m_iM800Full, $this->m_iM1500Full);
	}
	

}

?>