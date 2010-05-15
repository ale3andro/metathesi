<?php
	class ABasesController extends AppController
	{
		var $name = "ABases";
		var $paginate = array('limit' => 25, 'order' => array('ABasis.specialty_id' => 'asc', 'ABasis.points' => 'desc'));
		var $helpers = array('Html', 'Javascript');
		
		function index()
		{
			$this->redirect('/a_bases/search');
		}
		
		function search($arg = "n")
		{
			if ($arg=="n")
				$this->Session->delete("search_a_bases");
			
			if ( (isset($this->data)) || $this->Session->check("search_a_bases") )
			{
				if (isset($this->data))
				{
					$this->Session->delete("search_a_bases");
					$this->Session->write("search_a_bases", $this->data);
					
					if ($this->data['ABasis']['year'] != -1)
						$conditions['ABasis.year'] = $this->data['ABasis']['year'];
					if ($this->data['ABasis']['specialty_id'] != -1)
						$conditions['ABasis.specialty_id'] = $this->data['ABasis']['specialty_id'];
					if ($this->data['ABasis']['area_code'] != -1)
						$conditions['ABasis.area_code'] = $this->data['ABasis']['area_code'];
				}
				else
				{
					$data = $this->Session->read("search_a_bases");
					
					if ($data['ABasis']['year'] != -1)
						$conditions['ABasis.year'] = $data['ABasis']['year'];
					if ($data['ABasis']['specialty_id'] != -1)
						$conditions['ABasis.specialty_id'] = $data['ABasis']['specialty_id'];
					if ($data['ABasis']['area_code'] != -1)
						$conditions['ABasis.area_code'] = $data['ABasis']['area_code'];
				}
				$this->set('a_bases', $this->paginate("ABasis", $conditions));
				$this->set('a_specialties', $this->requestAction("/a_specialties/"));
				$this->set('a_areas_list', $this->requestAction("/a_areas/getDescriptionList"));
			}
			else
			{
				$this->set('areas_select_box', $this->requestAction("/a_areas/getSelectBox/data[ABasis][area_code]"));
				$this->set('years_select_box', $this->requestAction("/a_bases/getYearsSelectBox/data[ABasis][year]"));
				$this->set('specialties_select_box', $this->requestAction("a_specialties/getSelectBox/data[ABasis][specialty_id]"));
			}				
		}
		
		function fromSpecialty($specialtyId, $areaId)
		{
			if (!isset($specialtyId) || (!is_numeric($specialtyId)) || (!isset($areaId)) || (!is_numeric($areaId)) )
				$this->flash('Δεν υπάρχει η κατάλληλη είσοδος', '/provinces/viewAll/1', 3);
			else
			{
				$area = $this->requestAction("/a_areas/getDescriptionFromAreaId/" . $areaId);
				if ($area == false)
					$this->flash('Δεν υπάρχει περιοχή με αυτό το id', '/provinces/viewAll/1', 3);
				else
				{
					$province = $this->requestAction("/a_areas/getProvinceFromAreaId/" . $areaId);
					$a_areas = $this->requestAction("/a_areas/getFromDipeId/" . $province['Province']['id']);
					$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $province['Province']['id']);
					$region = $this->requestAction("/regions/getRegionFromId/" . $regionId);
			
					$bases = $this->ABasis->find('all', array(
												'conditions' => array('ABasis.specialty_id' => $specialtyId,					
													'ABasis.area_code' => $areaId),
													'order' => array('ABasis.year' => 'asc')));
					if ($bases == false)
						$this->flash('Δεν υπάρχει ειδικότητα με αυτό τον κωδικό', '/provinces/viewAll/1', 3);
					else
					{
						$this->set('specialtyId', $specialtyId);						
						$this->set('bases', $bases);
						$this->set('areaId', $areaId);
						$this->set('availableYears', $this->requestAction("/a_bases/getAvailableYears"));
						$this->set('area', $area);
						$this->set('theProvince', $province);
						$this->set('a_areas', $a_areas);
						$this->set('a_specialties', $this->requestAction("/a_specialties/"));
						$this->set('region', $region);
					}
				}
			}
		}
		function show($areaId, $year=-1)
		{
			$years = $this->requestAction("/a_bases/getAvailableYears");
			if ( (!is_numeric($year)) )
				$year=-1;
			else
			{
				$found = false;
				foreach ($years as $ayear)
				{
						if ($ayear['ABasis']['year'] == $year)
						{
							$found=true;
							break;
						}
				}			
				if (!$found)
					$year=-1;
			}
			
			if (!isset($areaId) || (!is_numeric($areaId)) )
				$this->flash('Δεν υπάρχει η κατάλληλη είσοδος', '/provinces/viewAll/1', 3);
			else
			{
				$area = $this->requestAction("/a_areas/getDescriptionFromAreaId/" . $areaId);
				if ($area == false)
					$this->flash('Δεν υπάρχει περιοχή με αυτό το id', '/provinces/viewAll/1', 3);
				else
				{
					$province = $this->requestAction("/a_areas/getProvinceFromAreaId/" . $areaId);
					$a_areas = $this->requestAction("/a_areas/getFromDipeId/" . $province['Province']['id']);
					$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $province['Province']['id']);
					$region = $this->requestAction("/regions/getRegionFromId/" . $regionId);
					if ($year==-1)
					{
						for ($i=0; $i<count($years); $i++)
							(($years[$i]['ABasis']['year']>$year)?($year=$years[$i]['ABasis']['year']):"");
					}
					
					$bases = $this->ABasis->find('all', 
											array( 
												'conditions' => 
													array('ABasis.year' => $year,
														'ABasis.area_code' => $areaId),
												'order' => 
													array('ABasis.specialty_id ASC')));												
					$this->set('pointsRange', $this->requestAction("/a_schools/getPointRange/" . $areaId));
					$this->set('bases', $bases);
					$this->set('years', $years);
					$this->set('year', $year);
					$this->set('areaId', $areaId);
					$this->set('area', $area);
					$this->set('theProvince', $province);
					$this->set('a_areas', $a_areas);
					$this->set('a_specialties', $this->requestAction("/a_specialties/"));
					$this->set('region', $region);
				}
			}
		}
		
		function getAvailableYears()
		{
			if (isset($this->params['requested']))
				return $this->ABasis->find('all', array('fields'=>array('DISTINCT (ABasis.year)'), 'order'=>array('ABasis.year')));
		}
		
		function getYearsSelectBox($selectName)
		{
			$years = $this->requestAction("a_bases/getAvailableYears");
			
			$retVal = "<select name=\"" . $selectName . "\">";
			$retVal .= "<option value=\"-1\">Όλες</option>";
			for ($i=0; $i<count($years); $i++)
				$retVal .= "<option value=\"" . $years[$i]['ABasis']['year'] . "\">" .  $years[$i]['ABasis']['year'] . "</option>";
			
			$retVal .= "</select>";
			return $retVal;	
		}
	}
?>
