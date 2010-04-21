<?php
	class AAreasController extends AppController
	{
		var $name = "AAreas";
		
		function index()
		{			
			if (isset($this->params['requested']))
				return $this->AArea->find("all");
			else
				$this->redirect('/provinces/viewAll/2', null, true);
		}
		
		function getFromDipeId($id)
		{			
			if (isset($this->params['requested']))
				return $this->AArea->findAllByDipeId($id);
			$this->set("a_areas", $this->AArea->findAllByDipeId($id));	
		}
		
		function getDescriptionFromAreaId($id)
		{
			if (isset($this->params['requested']))
				return $this->AArea->findById($id);		
		}
		
		function getProvinceFromAreaId($id)
		{
			if (isset($this->params['requested']))				
			{
				$theProvince = $this->AArea->findById($id); 				
				return $this->requestAction("/provinces/getDideAll/" . $theProvince['AArea']['dipe_id']);
			}
		}
		
		function getSelectBox($selectName, $selectedId = -1)
		{
			if (isset($this->params['requested']))
			{
				$allProvinces = $this->requestAction("/provinces/getAll");
				$allAreas = $this->AArea->find("all");
				$counter=0;
				foreach ($allProvinces as $province)
				{
					for ($i=0; $i<count($allAreas); $i++)
					{
						if ($allAreas[$i]['AArea']['dipe_id'] == $province['Province']['id'])
						{
							$final[$counter]['id'] = $allAreas[$i]['AArea']['id'];
							$final[$counter]['descr'] = $province['Province']['description'];
							$temp = explode(" ", $final[$counter]['descr']);
							
							if (count($temp) != 1)
							{
								if ($temp[1]!="Αττικής")
									$final[$counter]['descr'] = $temp[0];
								if ($temp[0]=='Αθήνας')
									$final[$counter]['descr'] = $temp[0] . " " . $temp[1];
							}
							
							$final[$counter]['prefix'] = $allAreas[$i]['AArea']['description'];
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
		
		function getDescriptionList()
		{
			if (isset($this->params['requested']))
			{
				$allProvinces = $this->requestAction("/provinces/getAll");
				$allAreas = $this->AArea->find("all");
				$counter=0;
				foreach ($allProvinces as $province)
				{
					for ($i=0; $i<count($allAreas); $i++)
					{
						if ($allAreas[$i]['AArea']['dipe_id'] == $province['Province']['id'])
						{
							$final[$allAreas[$i]['AArea']['id']]['id'] = $allAreas[$i]['AArea']['id'];
							$final[$allAreas[$i]['AArea']['id']]['descr'] = $province['Province']['description'];
							$temp = explode(" ", $final[$allAreas[$i]['AArea']['id']]['descr']);
							if (count($temp) != 1)
							{
								if ($temp[1]!="Αττικής")
									$final[$counter]['descr'] = $temp[0];
								if ($temp[0]=='Αθήνας')
									$final[$counter]['descr'] = $temp[0] . " " . $temp[1];
							}
							$final[$allAreas[$i]['AArea']['id']]['prefix'] = $allAreas[$i]['AArea']['description'];
							$counter++;	
						}
					}
				}			
			}
			return $final;			
		}
	}
?>
