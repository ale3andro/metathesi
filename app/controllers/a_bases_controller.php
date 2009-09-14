<?php
	class ABasesController extends AppController
	{
		var $name = "ABases";
		
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
													'ABasis.area_code' => $areaId)));
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
			
					$bases = $this->ABasis->find('all', array( 
										'conditions' => array('ABasis.year' => $year,
											'ABasis.area_code' => $areaId
											)));												
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
				return $this->ABasis->findAll(null, 'DISTINCT ABasis.year', 'ORDER BY ABasis.year');			
		}
	}
?>
