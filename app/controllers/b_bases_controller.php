<?php
	class BBasesController extends AppController
	{
		var $name = "BBases";
		var $paginate = array('limit' => 25, 'order' => array('BBasis.specialty_id' => 'asc', 'BBasis.points' => 'desc'));
		var $helpers = array('Html', 'Javascript');
		
		function index()
		{
			$this->set('areas_list_box', $this->requestAction("/b_areas/getSelectBox/b_areas"));
			$this->set('years_list_box', $this->requestAction("/b_bases/getYearsListBox/years"));
		}
		
		function year($year=-1)
		{
			$years = $this->requestAction("/b_bases/getAvailableYears");
			$maxYear = $years[0]['BBasis']['year'];
			$found = false;
			
			foreach ($years as $AYear)
			{
				if ($AYear['BBasis']['year']>$maxYear)
					$maxYear = $AYear['BBasis']['year'];
				if ($AYear['BBasis']['year']==$year)
					$found=true;
			}		
			if (!$found)
				$year=$maxYear;
	
			$this->set('year', $year);
			$this->set('bases', $this->paginate('BBasis', array('BBasis.year' => $year)));
			$this->set('b_specialties', $this->requestAction("/b_specialties/"));
			$this->set('b_areas_list', $this->requestAction("/b_areas/getDescriptionList"));
		}
		
		function show($areaId, $year=-1)
		{
			$years = $this->requestAction("/b_bases/getAvailableYears");
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
													'BBasis.area_code' => $areaId)));
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
		
		function getAvailableYears()
		{
			if (isset($this->params['requested']))
				return $this->BBasis->findAll(null, 'DISTINCT BBasis.year', 'ORDER BY BBasis.year');			
		}
		
		function getYearsListBox($selectName)
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
