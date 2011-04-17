<?php
class MediaController extends AppController {
    function dashboard(){
        $this->Media->process();

        $totalObama =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Obama')));
        $posObama =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Obama', 'Media.posorneg' => '0')));
        $negObama =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Obama', 'Media.posorneg' => '1')));
        $neuObama =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Obama', 'Media.posorneg' => '-1')));
        $obamaPosWords =$this->Media->find('all',array(
                                    'fields' => array('Media.word', 'COUNT(Media.word) AS n'),
                                    'conditions' => array('Media.politician_name' => 'Obama',
                                                        'Media.posorneg' => 0),
                                    'group' => 'Media.word'));
        $obamaNegWords =$this->Media->find('all',array(
                                    'fields' => array('Media.word', 'COUNT(Media.word) AS n'),
                                    'conditions' => array('Media.politician_name' => 'Obama',
                                                        'Media.posorneg' => 1),
                                    'group' => 'Media.word'));

        $totalBachmann =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Bachmann')));
        $posBachmann =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Bachmann', 'Media.posorneg' => '0')));
        $negBachmann =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Bachmann', 'Media.posorneg' => '1')));
        $neuBachmann =$this->Media->find('count',array('conditions' => array('Media.politician_name' => 'Bachmann', 'Media.posorneg' => '-1')));
        $bachmannPosWords =$this->Media->find('all',array(
                                    'fields' => array('Media.word', 'COUNT(Media.word) AS n'),
                                    'conditions' => array('Media.politician_name' => 'Bachmann',
                                                        'Media.posorneg' => 0),
                                    'group' => 'Media.word'));
        $bachmannNegWords =$this->Media->find('all',array(
                                    'fields' => array('Media.word', 'COUNT(Media.word) AS n'),
                                    'conditions' => array('Media.politician_name' => 'Bachmann',
                                                        'Media.posorneg' => 1),
                                    'group' => 'Media.word'));


        $obamaPosWordsResult = array();
        for($i=0;$i<count($obamaPosWords);$i++){
            $obamaPosWordsResult[$obamaPosWords[$i]['Media']['word']] = $obamaPosWords[$i][0]['n'];
        }

        $obamaNegWordsResult = array();
        for($i=0;$i<count($obamaNegWords);$i++){
            $obamaNegWordsResult[$obamaNegWords[$i]['Media']['word']] = $obamaNegWords[$i][0]['n'];
        }

        $Obama=array('percentage'=>
                                    array('positive'=> $totalObama==0? 0 : $posObama/$totalObama,
                                          'negative'=> $totalObama==0? 0 : $negObama/$totalObama,
                                          'neutral'=> $totalObama==0? 0 : $neuObama/$totalObama
                                        ),
                                'words'=>
                                    array('positive' => $obamaPosWordsResult,
                                          'negative' => $obamaNegWordsResult
                                        )
                    );

        $bachmannPosWordsResult = array();
        for($i=0;$i<count($bachmannPosWords);$i++){
            $bachmannPosWordsResult[$bachmannPosWords[$i]['Media']['word']] = $bachmannPosWords[$i][0]['n'];
        }

        $bachmannNegWordsResult = array();
        for($i=0;$i<count($bachmannNegWords);$i++){
            $bachmannNegWordsResult[$bachmannNegWords[$i]['Media']['word']] = $bachmannNegWords[$i][0]['n'];
        }

        $Bachmann=array('percentage'=>
                                    array('positive'=> $totalBachmann==0? 0 : $posBachmann/$totalBachmann,
                                          'negative'=> $totalBachmann==0? 0 : $negBachmann/$totalBachmann,
                                          'neutral'=> $totalBachmann==0? 0 : $neuBachmann/$totalBachmann
                                        ),
                                'words'=>
                                    array('positive' => $bachmannPosWordsResult,
                                          'negative' => $bachmannNegWordsResult
                                        )
                    );

        $this->log($Obama);
        $this->set('Obama',$Obama);

        $this->log($Bachmann);
        $this->set('Bachmann',$Bachmann);
    }
}
