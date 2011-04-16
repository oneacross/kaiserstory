<?php
class PoliticiansController extends AppController {
      var $helpers = array('Html','Form');
      var $name = 'Politicians';

      function sentiment(){
      	       $this->set('politicians', $this->Politician->find('all');
      }

}
?>

