<?php
class MediaController extends AppController {
    function dashboard(){
        $this->Media->process();
        $totalObama =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Obama')));
        $posObama =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Obama', 'Media.posorneg' => '0')));
        $negObama =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Obama', 'Media.posorneg' => '1')));
        $neuObama =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Obama', 'Media.posorneg' => '-1')));

        $this->set($Obama=array('percentage'=>
                                    array('positive'=> $posObama/$totalObama,
                                          'negative'=> $negObama/$totalObama,
                                          'neutral'=> $neuObama/$totalObama
                                    )/*
                                'words'=>
                                    array('positive' => array(word1=>freq1, word2=>freq2),
                                          'negative' => array(word1=>freq1, word2=>freq2)
                                    )*/
                                )
                );
    }
}
