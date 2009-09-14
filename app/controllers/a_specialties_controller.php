<?php
	class ASpecialtiesController extends AppController
	{
		var $name = "ASpecialties";
		var $paginate = array('limit' => 25, 'order' => array('ASpecialty.code' => 'asc',));
		
		function index()
		{			
			if (isset($this->params['requested']))
				return $this->ASpecialty->find('all');
			$this->set('title', "Ειδικότητες Εκπαιδευτικών Α/θμιας Εκπ/σης");		
			$this->set('data', $this->paginate());	
		}
	}
?>
