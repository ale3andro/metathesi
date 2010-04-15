<?php
	class BAreasController extends AppController
	{
		var $name = "BAreas";
		
		function index()
		{			
			if (isset($this->params['requested']))
				return $this->BArea->find("all");
			else
				$this->redirect('/provinces/viewAll/1', null, true);
		}
		
		function getSelectBox($selectName, $selectedId = -1)
		{
			if (isset($this->params['requested']))
			{
				$allProvinces = $this->requestAction("/provinces/getAll");
				$allAreas = $this->BArea->find("all");
				$counter=0;
				foreach ($allProvinces as $province)
				{
					for ($i=0; $i<count($allAreas); $i++)
					{
						if ($allAreas[$i]['BArea']['dide_id'] == $province['Province']['id'])
						{
							$final[$counter]['id'] = $allAreas[$i]['BArea']['id'];
							$final[$counter]['descr'] = $province['Province']['description'];
							$temp = explode(" ", $final[$counter]['descr']);
							if ( (count($temp) != 1) && ($temp[1]!="Αττικής") )
								$final[$counter]['descr'] = $temp[0];
							$final[$counter]['prefix'] = $allAreas[$i]['BArea']['description'];
							$counter++;	
						}
					}
				}			
				
				$retVal = "<select name=\"" . $selectName . "\">";
				$retVal .= "<option value=\"-1\">Όλες</option>";
				for ($i=0; $i<count($final); $i++)
					$retVal .= "<option value=\"" . $final[$i]['id'] . "\"" . 
						(($selectedId==$final[$i]['id'])?" selected=\"selected\"":"") . ">" .  $final[$i]['descr'] .
							" " . $final[$i]['prefix'] . "</option>";
				$retVal .= "</select>";
				return $retVal;				
			}
			
		}
		
		function getFromDideId($id)
		{			
			if (isset($this->params['requested']))
				return $this->BArea->findAllByDideId($id);
			$this->set("areas", $this->BArea->findAllByDideId($id));	
		}
		function getDescriptionFromAreaId($id)
		{
			if (isset($this->params['requested']))
				return $this->BArea->findById($id);		
		}
		function getProvinceFromAreaId($id)
		{
			if (isset($this->params['requested']))				
			{
				$dide = $this->BArea->findById($id); 				
				return $this->requestAction("/provinces/getDideAll/" . $dide['BArea']['dide_id']);
			}
		}
		
		function getDescriptionList()
		{
			if (isset($this->params['requested']))
			{
				$allProvinces = $this->requestAction("/provinces/getAll");
				$allAreas = $this->BArea->find("all");
				$counter=0;
				foreach ($allProvinces as $province)
				{
					for ($i=0; $i<count($allAreas); $i++)
					{
						if ($allAreas[$i]['BArea']['dide_id'] == $province['Province']['id'])
						{
							$final[$allAreas[$i]['BArea']['id']]['id'] = $allAreas[$i]['BArea']['id'];
							$final[$allAreas[$i]['BArea']['id']]['descr'] = $province['Province']['description'];
							$temp = explode(" ", $final[$allAreas[$i]['BArea']['id']]['descr']);
							if ( (count($temp) != 1) && ($temp[1]!="Αττικής") )
								$final[$allAreas[$i]['BArea']['id']]['descr'] = $temp[0];
							$final[$allAreas[$i]['BArea']['id']]['prefix'] = $allAreas[$i]['BArea']['description'];
							$counter++;	
						}
					}
				}			
			}
			return $final;			
		}
	}
?>
