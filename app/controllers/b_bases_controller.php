<?php
	class BBasesController extends AppController
	{
		var $name = "BBases";
		var $paginate = array('limit' => 25, 'order' => array('BBasis.specialty_id' => 'asc', 'BBasis.points' => 'desc'));
		var $helpers = array('Html', 'Javascript');
		
		function index()
		{
			$this->redirect('/b_bases/search');
		}
		
		function search($arg = "n")
		{
			if ($arg=="n")
				$this->Session->delete("search_b_bases");
			
			if ( (isset($this->data)) || $this->Session->check("search_b_bases") )
			{
				if (isset($this->data))
				{
					$this->Session->delete("search_b_bases");
					$this->Session->write("search_b_bases", $this->data);
					
					if ($this->data['BBasis']['year'] != -1)
						$conditions['BBasis.year'] = $this->data['BBasis']['year'];
					if ($this->data['BBasis']['specialty_id'] != -1)
						$conditions['BBasis.specialty_id'] = $this->data['BBasis']['specialty_id'];
					if ($this->data['BBasis']['area_code'] != -1)
						$conditions['BBasis.area_code'] = $this->data['BBasis']['area_code'];
				}
				else
				{
					$data = $this->Session->read("search_b_bases");
					
					if ($data['BBasis']['year'] != -1)
						$conditions['BBasis.year'] = $data['BBasis']['year'];
					if ($data['BBasis']['specialty_id'] != -1)
						$conditions['BBasis.specialty_id'] = $data['BBasis']['specialty_id'];
					if ($data['BBasis']['area_code'] != -1)
						$conditions['BBasis.area_code'] = $data['BBasis']['area_code'];
				}
				if (isset($conditions))
					$this->set('b_bases', $this->paginate("BBasis", $conditions));
				else
					$this->set('b_bases', $this->paginate("BBasis"));
				$this->set('b_specialties', $this->requestAction("/b_specialties/"));
				$this->set('b_areas_list', $this->requestAction("/b_areas/getDescriptionList"));
			}
			else
			{
				$this->set('areas_select_box', $this->requestAction("/b_areas/getSelectBox/data[BBasis][area_code]"));
				$this->set('years_select_box', $this->requestAction("/b_bases/getYearsSelectBox/data[BBasis][year]"));
				$this->set('specialties_select_box', $this->requestAction("b_specialties/getSelectBox/data[BBasis][specialty_id]"));
			}				
		}
		
		function show($areaId, $year=-1)
		{
			$old = true;
			if ($areaId<1000)
				$old = false;
				
			$years = $this->requestAction("/b_bases/getAvailableYears/" . $old);
			if ( (!is_numeric($year)) )
				$year=-1;
			else
			{
				$found = false;
				foreach ($years as $ayear)
				{
						if ($ayear['BBasis']['year'] == $year)
						{
							$found=true;
							break;
						}
				}			
				if (!$found)
					$year=-1;
			}
			
			if (!isset($areaId) || (!is_numeric($areaId)) )
				$this->flash('Δεν υπάρχει κατάλληλη είσοδος', '/provinces/viewAll/2', 3);
			else
			{
				$area = $this->requestAction("/b_areas/getDescriptionFromAreaId/" . $areaId);
				if ($area == false)
					$this->flash('Δεν υπάρχει περιοχή με αυτό το id', '/provinces/viewAll/2', 3);
				else
				{
					$province = $this->requestAction("/b_areas/getProvinceFromAreaId/" . $areaId);
					$b_areas = $this->requestAction("/b_areas/getFromDideId/" . $province['Province']['id']);
					$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $province['Province']['id']);
					$region = $this->requestAction("/regions/getRegionFromId/" . $regionId);
					if ($year==-1)
					{
						for ($i=0; $i<count($years); $i++)
							(($years[$i]['BBasis']['year']>$year)?($year=$years[$i]['BBasis']['year']):"");
					}
			
					$bases = $this->paginate('BBasis', array('BBasis.year' => $year, 'BBasis.area_code' => $areaId));
			
					$this->set('pointsRange', $this->requestAction("/b_schools/getPointRange/" . $areaId));
					$this->set('bases', $bases);
					$this->set('years', $years);
					$this->set('year', $year);
					$this->set('areaId', $areaId);
					$this->set('area', $area);
					$this->set('theProvince', $province);
					$this->set('b_areas', $b_areas);
					$this->set('b_specialties', $this->requestAction("/b_specialties/"));
					$this->set('region', $region);
				}
			}			
		}
		
		function fromSpecialty($specialtyId, $areaId)
		{
			if (!isset($specialtyId) || (!is_numeric($specialtyId)) || (!isset($areaId)) || (!is_numeric($areaId)) )
				$this->flash('Δεν υπάρχει η κατάλληλη είσοδος', '/provinces/viewAll/2', 3);
			else
			{
				$area = $this->requestAction("/b_areas/getDescriptionFromAreaId/" . $areaId);
				if ($area == false)
					$this->flash('Δεν υπάρχει περιοχή με αυτό το id', '/provinces/viewAll/2', 3);
				else
				{
					$province = $this->requestAction("/b_areas/getProvinceFromAreaId/" . $areaId);
					$b_areas = $this->requestAction("/b_areas/getFromDideId/" . $province['Province']['id']);
					$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $province['Province']['id']);
					$region = $this->requestAction("/regions/getRegionFromId/" . $regionId);
						
					$bases = $this->BBasis->find('all', array(
												'conditions' => array('BBasis.specialty_id' => $specialtyId,					
													'BBasis.area_code' => $areaId),
													'order' => array('BBasis.year' => 'asc')));
					if ($bases == false)
						$this->flash('Δεν υπάρχει ειδικότητα με αυτό τον κωδικό', '/provinces/viewAll/2', 3);
					else
					{
						$this->set('specialtyId', $specialtyId);						
						$this->set('bases', $bases);
						$this->set('availableYears', $this->requestAction("/b_bases/getAvailableYears"));
						$this->set('area', $area);
						$this->set('theProvince', $province);
						$this->set('b_areas', $b_areas);
						$this->set('b_specialties', $this->requestAction("/b_specialties/"));
						$this->set('region', $region);						
					}
				}
			}	
		}
		
		function getAvailableYears($old=false)
		{
			# Αν το $old είναι true, επιστρέφει χρονολογίες μέχρι 2012
			# Διαφορετικά χρονολογιές από 2013 και μετά - μετά την αλλαγή των περιοχών
			if ($old)
				$conditions = array('BBasis.year <' => 2013);
			else
				$conditions = array('BBasis.year >=' => 2013);
				
			if (isset($this->params['requested']))
				return $this->BBasis->find('all',  
										array(	'conditions'=>$conditions,
												'fields'=>array('DISTINCT (BBasis.year)'), 
												'order'=>array('BBasis.year')));
		}
		
		function getYearsSelectBox($selectName)
		{
			$years = $this->requestAction("b_bases/getAvailableYears");
			
			$retVal = "<select name=\"" . $selectName . "\">";
			$retVal .= "<option value=\"-1\">Όλες</option>";
			for ($i=0; $i<count($years); $i++)
				$retVal .= "<option value=\"" . $years[$i]['BBasis']['year'] . "\">" .  $years[$i]['BBasis']['year'] . "</option>";
			
			$retVal .= "</select>";
			return $retVal;	
		}
	}
?>
