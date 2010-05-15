<?php
	class BSchoolsController extends AppController
	{
		var $name = "BSchools";
		var $paginate = array('limit' => 25, 'order' => array('BSchool.type' => 'asc', 
							'BSchool.municipality' => 'asc',
							'BSchool.number' => 'asc'));
		
		function index()
		{			
			$this->set("schools", $this->paginate());
			$this->set("b_areas", $this->requestAction("/b_areas"));
			$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));
		}
		
		function getSchoolsOfTypeFromDideId($dideId, $typeId)
		{
			if (!isset($dideId) || (!is_numeric($dideId)))
				$this->redirect('/b_schools/', null, true);
			
			if (!isset($typeId) || (!is_numeric($typeId)))
				$this->redirect('/b_schools/getFromDideId/' . $dideId, null, true);			
			
			$conditions = array("BSchool.dide_id" => $dideId,
									"BSchool.type" => $typeId);
			if (isset($this->params['requested']))
				return $this->BSchool->find('all', $conditions);
			$schools = $this->BSchool->find('all', $conditions);
			$this->set("provinceId", $dideId);
			$schools = $this->paginate("BSchool", array('BSchool.dide_id =' => $dideId, 'BSchool.type =' => $typeId));
			$this->set("schools", $schools);
			$this->set("theProvince", $this->requestAction("/provinces/getProvinceFromId/" . $dideId));
			$this->set("b_areas", $this->requestAction("/b_areas/getFromDideId/" . $dideId));
			$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));	
			$this->set("schoolType", $typeId);
			$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $dideId);
			$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $regionId));
		}
		
		function getFromDideId($id)
		{			
			if (!isset($id) || (!is_numeric($id)))
				$this->redirect('/b_schools/', null, true);
			
			if (isset($this->params['requested']))
				return $this->BSchool->findAllByDideId($id);
			$this->set("provinceId", $id);
			$schools = $this->paginate('BSchool', array('BSchool.dide_id =' => $id));
			$this->set("schools", $schools);
			$this->set("theProvince", $this->requestAction("/provinces/getProvinceFromId/" . $id));
			$this->set("b_areas", $this->requestAction("/b_areas/getFromDideId/" . $id));
			$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));
			$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $id);
			$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $regionId));
		}
		
		function getFromAreaId($id)
		{
			if (!isset($id) || (!is_numeric($id)))
				$this->redirect('/b_schools/', null, true);
			
			if (isset($this->params['requested']))
				return $this->BSchool->findAllByAreaId($id);
			$this->set("schools", $this->paginate('BSchool', array('BSchool.area_id =' => $id)));
			$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));			
			$this->set("b_area", $this->requestAction("/b_areas/getDescriptionFromAreaId/" . $id));		
			$theProvince = $this->requestAction("/b_areas/getProvinceFromAreaId/" . $id);
			$this->set("theProvince", $theProvince);
			$this->set("b_areas", $this->requestAction("/b_areas/getFromDideId/" . $theProvince['Province']['id']));
			$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $theProvince['Province']['id']);
			$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $regionId));
		}
		
		function search($arg = "n")
		{
			if ($arg=="n")
				$this->Session->delete("search_b_schools");			
			
			if (isset($this->data) || $this->Session->check("search_b_schools"))
			{
				if (isset($this->data))
				{
					$this->Session->delete("search_b_schools");
					$this->Session->write("search_b_schools", $this->data);
					$this->Session->write("moreLess", $_REQUEST['moreLess']);
					
					if ($this->data['BSchool']['municipality']!='')
						$conditions['BSchool.municipality LIKE'] = "%" . $this->data['BSchool']['municipality'] . "%";
					
					$conditions['BSchool.points ' . $_REQUEST['moreLess']] = $this->data['BSchool']['points'];
					
					if ($this->data['BSchool']['area_id'] != "-1")
						$conditions['BSchool.area_id'] = $this->data['BSchool']['area_id'];		
				}
				else
				{
					$data = $this->Session->read("search_b_schools");
					$moreLess = $this->Session->read("moreLess");
					
					if ($data['BSchool']['municipality']!='')
						$conditions['BSchool.municipality LIKE'] = "%" . $data['BSchool']['municipality'] . "%";
					
					$conditions['BSchool.points ' . $moreLess] = $data['BSchool']['points'];
					
					if ($data['BSchool']['area_id'] != "-1")
						$conditions['BSchool.area_id'] = $data['BSchool']['area_id'];		
				}
				$this->set("schools", $this->paginate('BSchool', $conditions));
				$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));
				$this->set("b_areas", $this->requestAction("/b_areas/"));	
				$this->set("provinces", $this->requestAction("/provinces/"));
			}
			else
			{
				$selectName = "data[BSchool][area_id]";
				$this->set("b_areas_select", $this->requestAction("/b_areas/getSelectBox/" . $selectName));
			}
		}
		
		function getPointRange($areaId)
		{
			if (isset($this->params['requested']))				
			{
				$resultMax = $this->BSchool->query('SELECT MAX(points) as max FROM b_schools WHERE area_id=' . $areaId);
				$ret[1] = $resultMax[0][0]['max'];
				$resultMin = $this->BSchool->query('SELECT MIN(points) as min FROM b_schools WHERE area_id=' . $areaId);
				$ret[0] = $resultMin[0][0]['min'];
				return $ret;
			}
		}	
	}
?>
