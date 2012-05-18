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
			case "iM50Min" :
				$this -> m_iM50Min = $p_vValue;
				break;
			case "iM50Sec" :
				$this -> m_iM50Sec = $p_vValue;
				break;
			case "iM50Hun" :
				$this -> m_iM50Hun = $p_vValue;
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
            case "iM50Min" :
                $vResult = $this -> m_iM50Min;
				break;
            case "iM50Sec" :
                $vResult = $this -> m_iM50Sec;
				break;
			case "iM50Hun" :
				$vResult = $this -> m_iM50Hun;
				break;
            default :
                break;
		}

		return $vResult;
	}

	public function timeReg(){
		require_once 'classes/database.class.php';
		$db = new Database();
		$db -> registerTime($this->m_sCompetition, $this->m_sDistance, $this->m_iTimeFull, $this->m_iReactionFull);
	}

}

?>