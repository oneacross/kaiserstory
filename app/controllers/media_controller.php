<?php
class MediaController extends AppController {



	function dashboard () {
    $positiveWords= array(adaptable, Admiration, Adorable, Affectionate, Alive,Anticipate,Appreciated, Awe,Bold, Bonding,Brilliant, Caring, Cautious, Cheerful, Clever, Cognizant,Comical, Compassionate,Content, Cool, Coping, Cordial, Creative,Curious, Dainty,Delight,Devoted,Disciplined,
Driven, Dutiful, Dynamic, Elated, Enraged, Enthused, Enthusiastic, Excited, Generous, Gentle, Grateful, Gratified,
Forgiving, Gay, Impartial,Inspired, Instinctive,Intuitive,
Innocent, Inquisitive,Happy,  Heroic, Honest, Hopeful,
Joyful,Kind,Lively, Loving, Lucky, Motivated, Natural, Nurturing, Optimistic, Outstanding, Patient, Perceptive,Perky, Positive, Powerful, Pride,
Realistic, Relaxed, Reliable, Relief, Repentant, Restrained, Reverent,
Satisfy, Sensitive, Sentimental, Skillful,Sure, Sweet, Tame,Tender,Understood, Victorious, Valiant, Wise, Wonder,Worthy,Vocal,youthful);


$negativeWords = adaptable(Abandonment, Addictive, Aggravate, Aggressive, Agitated,  Angry, Angst, Annoyed,  Anxiety, Arrogance, Ashamed, Authoritative,  Awful,
Belligerent, Bitter, Blue, Blunt,  Bored,  Brutal, Bullying, Callous,  Combative,  Conflicted, Contemptuous, Contrary, Covetous, Cranky, Cross, Cruelty,
Defeated, Defiant, Dejected,  Dependent, Depressed, Despair,  Disagreeable,  Discontent, Disgust, Disturbed, Doubtful, Envy, Evil,
Fear, Fierce, Frustrated, Furious, Greedy, Grieving, Harsh, Hatred, Haughty, Horror, Hostile,
Ignored,  Impatient, Impulsive, Inconsiderate,  Insensitivity,  Intolerance, Irritate, Isolated, Jealous,
Lonely, Lost, Mad, Malice, Mean, Meek, Mollified, Nasty, Naughty, Negative,
Obnoxious, Obstinate, Outraged, Pain, Panic,, Perturb, Pessimistic, Pity,
Quirky, Quivering, Rage, Raw, Scornful, Reluctant, Repulsive, Resent, Resigned,  Rough, Rude,
Severe, Shame, Sick, Silly, Sorrow, Spite, Stubborn,  Surprise,
Tense, Terrified, Terse, Tired, Unbalanced, Uncertain, Unhappy,
Vindictive, Violent,  Vociferous, Wary, Weary, Wicked, Worrier, Wrath);

        $contents = $this->Media->find('all',array('fields' => array('Media.id', 'Media.content')));
        $emotions = $positiveWords;
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