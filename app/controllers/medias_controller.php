<?php
class MediasController extends AppController {

	function dashboard () {

        $contents = $this->find('all',array('fields' => array('Media.id', 'Media.content')));
        $emotions = $this->find('all',array('fields' => array('Emotions.word')));
            $contentArray = explode(" ", $content['content']);
            $steamedContent = $this->Media->stemList($contentArray);
            $this->log($steamedContent);
            $found = false;
                for($i=0;$i<count($steamedContent);$i++){
                    $j=0;
                    while($j<count($emotions) && !$found){
                        if($emotions[$j] = $steamedContent[$i]){
                            $found = true;
                        }
                        $j++;
                    }
                }
        $this->set('result',$emotions[$j-1]);
	}

}
