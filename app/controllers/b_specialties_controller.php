<?php
	class BSpecialtiesController extends AppController
	{
		var $name = "BSpecialties";
		var $paginate = array('limit' => 25, 'order' => array('BSpecialty.code' => 'asc',));
		
		function index()
		{			
			if (isset($this->params['requested']))
				return $this->BSpecialty->find('all');
			
			$this->set('title', "Ειδικότητες Εκπαιδευτικών Β/θμιας Εκπ/σης");
			$this->set('data', $this->paginate());		
		}
	}
?>
