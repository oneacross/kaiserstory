<?php
    class Media extends AppModel {

        function evaluateContent($content){
            $contentArray = explode(" ", $content);
            for($i=0; $i++; $i<count($contentArray){
                $this->Concept->findFirst(
                       array(
                       'conditions' => array('Concept.name' => $contentArray[$i]), //array of conditions
                       'recursive' => 1, //int
                       'fields' => array('Model.field1', 'DISTINCT Model.field2'), //array of field names
                       'order' => array('Model.created', 'Model.field3 DESC'), //string or array defining order
                       'group' => array('Model.field'), //fields to GROUP BY
                       'limit' => n, //int
                       'page' => n, //int
                       'offset'=>n, //int
                      'callbacks' => true //other possible values are false, 'before', 'after'
                      )


                )
            }
        }
    }
?>
