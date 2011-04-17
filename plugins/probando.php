<?php

	$user="root";
	$pw="kaiser";
	$bd="kaiser";

    echo "script is running";
	
	$conexio = mysql_connect($host,$user,$pw) or die("resultado=".urlencode(mysql_error()));
	$seleccionado=mysql_select_db($bd,$conexio) or die("resultado=".urlencode(mysql_error()));			

	$query="SELECT content FROM medias";
	$result=mysql_query($query);
	echo "RESULTADOS ".mysql_num_rows($result)."<br/>";
	echo mysql_error();
	
	while(($row=mysql_fetch_array($result))!=null){
		$comment.=$row["content"];		
	}


//	$mainTerm=$_POST["mainTerm"];
	
	$words=explode(" ", $comment);
	
	
	
	//Obtain useless words
//	echo "1";
	$ewFile=fopen ( "stopWords.csv" , "r" );
//	echo "2";	
	$fileContent="";
//	echo "3";	
	while ( $line = fgets($ewFile) ) {
		$fileContent.=$line;
	}
//	echo "4";	
	$emptyWords=explode(",", $fileContent);
//	echo "5";	



	//Obtain qualified words
//	$goodWords=array("Adaptable"," Admiration"," Adorable"," Affectionate"," Alive","Anticipate","Appreciated"," Awe","Bold"," Bonding","Brilliant","Caring"," Cautious"," Cheerful"," Clever"," Cognizant","Comical"," Compassionate","Content"," Cool"," Coping"," Cordial"," Creative","Curious"," Dainty","Delight","Devoted","Disciplined","Driven"," Dutiful"," Dynamic"," Elated"," Enraged"," Enthused"," Enthusiastic"," Excited"," Generous"," Gentle"," Grateful"," Gratified"," Forgiving"," Gay"," Impartial","Inspired"," Instinctive","Intuitive","Innocent"," Inquisitive","Happy","  Heroic"," Honest"," Hopeful","Joyful","Kind","Lively"," Loving"," Lucky"," MotivatedNatural"," Nurturing"," Optimistic"," Outstanding"," Patient"," Perceptive","Perky"," Positive"," Powerful"," Pride","Realistic"," Relaxed"," Reliable"," Relief"," Repentant"," Restrained"," Reverent","Satisfy"," Sensitive"," Sentimental"," Skillful","Sure"," Sweet"," Tame","Tender","Understood"," Victorious"," Valiant"," Wise"," Wonder","Worthy","Vocal","youthful", "week");
	
//	$badWords=array("Abandonment"," Addictive"," Aggravate"," Aggressive"," Agitated","  Angry"," Angst"," Annoyed","  Anxiety"," Arrogance"," Ashamed"," Authoritative","  Awful","Belligerent"," Bitter"," Blue"," Blunt","  Bored","  Brutal"," Bullying"," Callous","  Combative","  Conflicted"," Contemptuous"," Contrary"," Covetous"," Cranky"," Cross"," Cruelty"," Defeated"," Defiant"," Dejected","  Dependent"," Depressed"," Despair","  Disagreeable","  Discontent"," Disgust"," Disturbed"," Doubtful"," Envy"," Evil","Fear"," Fierce"," Frustrated"," Furious"," Greedy"," Grieving"," Harsh"," Hatred"," Haughty"," Horror"," Hostile","Ignored","  Impatient"," Impulsive"," Inconsiderate","  Insensitivity","  Intolerance"," Irritate"," Isolated"," Jealous"," Lonely"," Lost"," Mad"," Malice"," Mean"," Meek"," Mollified"," Nasty"," Naughty"," Negative"," Obnoxious"," Obstinate"," Outraged"," Pain"," Panic",""," Perturb"," Pessimistic"," Pity"," "," Quirky"," Quivering"," Rage"," Raw"," Scornful"," Reluctant"," Repulsive"," Resent"," Resigned","  Rough"," Rude","Severe"," Shame"," Sick"," Silly"," Sorrow"," Spite"," Stubborn","  Surprise","Tense"," Terrified"," Terse"," Tired"," Unbalanced"," Uncertain"," Unhappy","Vindictive"," Violent","  Vociferous"," Wary"," Weary"," Wicked"," Worrier"," Wrath", "Tempted"," Exhausted", "need");
	
	//process message
//	echo "PROCESSING ".$comment."\n";
//	echo "6";	
	$commentWords=explode(" ", $comment);
	$usedWords=array();
//	echo "7";	
//	echo "Useless Words (according to google search)\n";
	foreach($commentWords as $commentWord){
		$isEmpty=false;
		for($i=0;$i<sizeof($emptyWords);$i++){
			if(strtolower(trim($commentWord))==strtolower(trim($emptyWords[$i]))){		
//				echo $commentWord."<br/>";
				$isEmpty=true;
			}
		}	
		if(!$isEmpty){
			if(in_array(trim(strtolower($commentWord)), array_keys($usedWords))){
				$usedWords[trim(strtolower($commentWord))]++;
//					echo "palabra repetida ".$commentWord."<br/>";
			}
			else{
				$usedWords[trim(strtolower($commentWord))]=1;
//					echo "palabra encontrada ".$commentWord."<br/>";					
			}	
		}
	}
//	echo "<br/><br/><br/><br/><br/>";
//	echo "NUMERO DE PALABRAS".sizeof($usedWords);	
	asort($usedWords);
	
	$words=array_keys($usedWords);

	echo "<table border='1'>";
	foreach($words as $word){
		echo "<tr><td>".$word."</td><td>".$usedWords[$word]."</td></tr>";

	}
	echo "</table>";
/*	echo "Relevant good Words\n";
	foreach($commentWords as $commentWord){
		for($i=0;$i<sizeof($goodWords);$i++){
			if(strtolower(trim($commentWord))==strtolower(trim($goodWords[$i]))){		
				echo $commentWord."\n\n\n";
			}
		}	
	}	
	echo "Relevant bad Words\n";	
	foreach($commentWords as $commentWord){
		for($i=0;$i<sizeof($badWords);$i++){
			if(trim($commentWord)==trim($badWords[$i])){		
				echo $commentWord."\n\n\n";
			}
		}	
	}	
*/	
	
	
	
//	echo "8";	
	

	
	
	
?>
