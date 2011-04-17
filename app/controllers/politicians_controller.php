<?php
class PoliticiansController extends AppController {
    var $helpers = array('Html','Form');

      function sentiment($politician = null){
	$this->set('politicians', $this->Politician->find('all'));
      }

}
?>

