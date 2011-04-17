<?php
class PoliticiansController extends AppController {
<<<<<<< HEAD
    var $helpers = array('Html','Form');

      function sentiment($politician = null){
	$this->set('politicians', $this->Politician->find('all'));
=======
      var $helpers = array('Html','Form');
      var $name = 'Politicians';

      function sentiment(){
      	       $this->set('politicians', $this->Politician->find('all');
>>>>>>> mergy
      }

}
?>

