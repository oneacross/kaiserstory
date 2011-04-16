<?php
class MediasController extends AppController {

	function dashboard () {
        $content = $this->findFirst();
        $contentArray = explode(" ", $content);
        for($i=0; $i++; $i<count($contentArray){
            $this->Concept->find($contentArray[$i])
        }
	}

}
