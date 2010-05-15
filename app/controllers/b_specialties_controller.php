<?php
	class BSpecialtiesController extends AppController
	{
		var $name = "BSpecialties";
		var $paginate = array('limit' => 25, 'order' => array('BSpecialty.code' => 'asc'));
		
		function index()
		{			
			if (isset($this->params['requested']))
				return $this->BSpecialty->find('all', array('order' => array('BSpecialty.code')));
			
			$this->set('data', $this->paginate());		
		}
		
		function getSelectBox($selectName)
		{
			$specialties = $this->requestAction("b_specialties");
			$retVal = "<select name=\"" . $selectName . "\">";
			$retVal .= "<option value=\"-1\">Όλες</option>";
			for ($i=0; $i<count($specialties); $i++)
				$retVal .= "<option value=\"" . $specialties[$i]['BSpecialty']['id'] . "\">" .  
									$specialties[$i]['BSpecialty']['code'] . "</option>";
			
			$retVal .= "</select>";
			return $retVal;
		}
	}
?>
