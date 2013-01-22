<?php
	class ProvincesController extends AppController
	{
		var $name="Provinces";
		
		function index()
		{
			$this->pageTitle = "Οι περιοχές της Ελληνικής Εκπαίδευσης";
			if (isset($this->params['requested']))
				return $this->Province->find("all");
			else
				$this->redirect('/provinces/viewAll', null, true);
		}
		
		function getAll()
		{
			if (isset($this->params['requested']))
				return $this->Province->find("all", array('order' => array('Province.description')));
		}
		function getDideAll($id)
		{
			return $this->Province->findById($id);
		}
		function getProvinceFromId($id)
		{
			return $this->Province->findById($id);
		}
		function getRegionIdFromProvinceId($id)
		{
			$province = $this->Province->findById($id);
				return $province['Province']['pde_id'];
		}
		function show($id, $ab = 0)
		{
			if (!isset($id) || (!is_numeric($id)))
				$this->redirect('/provinces/viewAll', null, true);
			/*
			  	$ab = 0 δείξε Πρωτοβάθμια και Δευτεροβάθμια
			  	 	= 1 δείξε μόνο Πρωτοβάθμια
			  	 	= 2 δείξε μόνο Δευτεροβάθμια
			*/
			if ( ($ab!=1) && ($ab!=2) )
				$ab = 0;
			$province = $this->Province->findById($id); 			
			if ($province == false)
				$this->flash('Δεν υπάρχει περιοχή με αυτό το id...', '/provinces/viewAll', 3);
			else
			{
				$this->set("ab", $ab);
				$this->set("theProvince", $province);
			
				if ($ab!=0)
				{
					$a_areas = $this->requestAction("/a_areas/getFromDipeId/" . $province['Province']['id'] . "/2");
					$this->set("a_areas", $a_areas);
					$b_areas = $this->requestAction("/b_areas/getFromDideId/" . $province['Province']['id'] . "/2");
					$this->set("b_areas", $b_areas);
					
					$i=0;
					if ($ab==1)
					{
						foreach ($a_areas as $a_area)
							if ($a_area['AArea']['id']<1000)
								$a_m[$i++] = $this->requestAction("/municipalities/getFromAAreaId/" . $a_area['AArea']['id']);
						$this->set("a_mun", $a_m);
					}
					if ($ab==2)
					{
						foreach($b_areas as $b_area)
							if ($b_area['BArea']['id']<1000)
								$b_m[$i++] = $this->requestAction("/municipalities/getFromBAreaId/" . $b_area['BArea']['id']);
						$this->set("b_mun", $b_m);
					}
				}
								
				$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $province['Province']['pde_id']));				
				if ($ab==0)
					$this->set("mapLink", $province['Province']['map_link']);
				$this->set("neighboors", $this->Province->find("all", array(
						'conditions' => array('Province.pde_id' => $province['Province']['pde_id'],
												'Province.id !=' => $id))));
			}
		}
		function viewAll($ab=0)
		{
			/*
			  	$ab = 0 δείξε Πρωτοβάθμια και Δευτεροβάθμια
			  	 	= 1 δείξε μόνο Πρωτοβάθμια
			  	 	= 2 δείξε μόνο Δευτεροβάθμια
			*/
			if ($ab<0 || $ab>2)
				$ab=0;
			$data = $this->requestAction("/provinces/getAll");
			$this->set("data", $data);
			$this->set("ab", $ab);
		}	
	}
?>
