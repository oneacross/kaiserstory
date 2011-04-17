<?php
class MediaController extends AppController {

	function dashboard () {
    $positiveWords= array('adaptable', 'Admiration', 'Adorable', 'Affectionate', 'Alive','Anticipate','Appreciated', 'Awe','Bold', 'Bonding',
    'Brilliant', 'Caring', 'Cautious', 'Cheerful', 'Clever', 'Cognizant','Comical', 'Compassionate','Content', 'Cool', 'Coping', 'Cordial',
    'Creative','Curious', 'Dainty','Delight','Devoted','Disciplined','Driven', 'Dutiful', 'Dynamic', 'Elated', 'Enraged', 'Enthused',
    'Enthusiastic', 'Excited', 'Generous', 'Gentle', 'Grateful', 'Gratified','Forgiving', 'Gay', 'Impartial','Inspired', 'Instinctive','Intuitive',
'Innocent', 'Inquisitive','Happy',  'Heroic', 'Honest', 'Hopeful',
'Joyful','Kind','Lively', 'Loving', 'Lucky', 'Motivated', 'Natural', 'Nurturing', 'Optimistic', 'Outstanding', 'Patient', 'Perceptive',
'Perky', 'Positive', 'Powerful', 'Pride','Realistic', 'Relaxed', 'Reliable', 'Relief', 'Repentant', 'Restrained', 'Reverent',
'Satisfy', 'Sensitive', 'Sentimental', 'Skillful','Sure', 'Sweet', 'Tame','Tender','Understood', 'Victorious', 'Valiant', 'Wise', 'Wonder',
'Worthy','Vocal','youthful');


$negativeWords = array('Abandonment', 'Addictive', 'Aggravate', 'Aggressive', 'Agitated',  'Angry', 'Angst', 'Annoyed',  'Anxiety',
'Arrogance', 'Ashamed', 'Authoritative',  'Awful','Belligerent', 'Bitter', 'Blue', 'Blunt',  'Bored',  'Brutal', 'Bullying', 'Callous',
'Combative',  'Conflicted', 'Contemptuous', 'Contrary', 'Covetous', 'Cranky', 'Cross', 'Cruelty',
'Defeated', 'Defiant', 'Dejected', 'Dependent', 'Depressed', 'Despair',  'Disagreeable', 'Discontent', 'Disgust', 'Disturbed', 'Doubtful',
'Envy', 'Evil','Fear', 'Fierce', 'Frustrated', 'Furious', 'Greedy', 'Grieving', 'Harsh', 'Hatred', 'Haughty', 'Horror', 'Hostile',
'Ignored', 'Impatient', 'Impulsive', 'Inconsiderate', 'Insensitivity', 'Intolerance', 'Irritate', 'Isolated', 'Jealous',
'Lonely', 'Lost', 'Mad', 'Malice', 'Mean', 'Meek', 'Mollified', 'Nasty', 'Naughty', 'Negative',
'Obnoxious', 'Obstinate', 'Outraged', 'Pain', 'Panic', 'Perturb', 'Pessimistic', 'Pity',
'Quirky', 'Quivering', 'Rage', 'Raw', 'Scornful', 'Reluctant', 'Repulsive', 'Resent', 'Resigned', 'Rough', 'Rude',
'Severe', 'Shame', 'Sick', 'Silly', 'Sorrow', 'Spite', 'Stubborn', 'Surprise','Tense', 'Terrified', 'Terse', 'Tired', 'Unbalanced',
'Uncertain', 'Unhappy','Vindictive', 'Violent',  'Vociferous', 'Wary', 'Weary', 'Wicked', 'Worrier', 'Wrath');

        $content = $this->Media->find('all',array('fields' => array('Media.id', 'Media.content')));
        $lists = array($positiveWords, $negativeWords);
        for($l=0; $l<count($lists);$l++){
            $emotions = $lists[$l];
            for($n=0; $n<count($content); $n++){
                $frequency = array(
                    array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
                    array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
                );
                $contentArray = explode(" ", $content[$n]['Media']['content']);
                for($i=0;$i<count($contentArray);$i++){
                    $j=0;
                    while($j<count($emotions)){
                        if(strtolower($emotions[$j]) == strtolower($contentArray[$i])){
                            $frequency[$l][$j]++;
                        }
                        $j++;
                    }
                }
                $max=0;
                $posOrNeg = -1;
                $maxIndex = -1;
                for($ll=0; $ll<count($frequency);$ll++){
                    for($i=0;$i<count($frequency[$ll]);$i++){
$this->log($ll.": ".$i.": ".$frequency[$ll][$i]);
                        if($frequency[$ll][$i] > $max){
                            $posOrNeg = $ll;
                            $maxIndex = $i;
                        }
                    }
                }
                if($max > 0){
                    $result=array('Media'=>array(
                                        'id'=>$content[$n]['Media']['id'],
                                        'posorneg'=>$posOrNeg,
                                        'word'=>$lists[$posOrNeg][$max]
                                    ));
$this->log($result);
                }

            }
        }
    }
}
