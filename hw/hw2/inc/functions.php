<?php
function play(){
	
	/* The Cards */
	$suits=array("S","H","C","D");
	$faces=array("2","3","4","5","6","7","8","9","10","J","Q","K","A");
	
	/* The Deck = 52 cards */
	$deck=array();
	foreach($suits as $suit){
		foreach($faces as $face){
			/* array_push($deck,$face.$suit); */
			$deck[] = array("face" => $face, "suit" => $suit);
		}
	}

 	 shuffle($deck);
	
/* 	test */
/*	$card = array_shift($deck);
	$hand = $card['face'].$card['suit'];
	echo "<h2> $hand </h2>"; */
	
/* 	test */
/*	$randomKey=array_rand($deck,1);
	echo "<h2> $randomKey  </h2>";
	$randomCard = $deck[$randomKey];
	echo "<h2> $randomCard  </h2>";
 	displayHand($randomCard); */
	
	/* Deal 3 cards to player1 */
  	for($i=1;$i<4;$i++){
		${"card".$i} = array_shift($deck);
		${"randomCard".$i} = ${"card".$i} ['face'].${"card".$i} ['suit'];
		displayHand(${"randomCard".$i},$i);
	} 
	 
  	echo '<br/><br/>';
	 
	/* Deal 3 cards to player2 */
 	 for($i=4;$i<7;$i++){
		${"card".$i} = array_shift($deck);
		${"randomCard".$i} = ${"card".$i} ['face'].${"card".$i} ['suit'];
		displayHand(${"randomCard".$i},$i);
	} 
	
	twentyOne($card1,$card2,$card3,$card4,$card5,$card6);

} 

function displayHand($randomCard, $pos){
	echo "<img id='card$pos' src='img/$randomCard.png' alt='$randomCard' title='$randomCard' /* width='70' */ />";
}

function twentyOne($card1,$card2,$card3,$card4,$card5,$card6){
	$p1total=0;
	$p2total=0;
	for($i=1;$i<4;$i++){
		for($k=2;$k<11;$k++){
			if(${"card".$i}['face'] === "$k"){
				$p1total = $p1total+$k;
			}
		} 
		switch(${"card".$i}['face']){
			case "A": $p1total = $p1total + 1;
				break;
			case "J": $p1total = $p1total + 10;
				break;
			case "Q": $p1total = $p1total + 10;
				break;
			case "K": $p1total = $p1total + 10;
				break;
		}			
	}
	echo "<div id='p1Points'>";
 	echo "<h2> Player 1: $p1total </h2>"; 
	echo "</div>";
	
	for($i=4;$i<7;$i++){
		for($k=2;$k<11;$k++){
			if(${"card".$i}['face'] === "$k"){
				$p2total = $p2total+$k;
			}
		} 
		switch(${"card".$i}['face']){
			case "A": $p2total = $p2total + 1;
				break;
			case "J": $p2total = $p2total + 10;
				break;
			case "Q": $p2total = $p2total + 10;
				break;
			case "K": $p2total = $p2total + 10;
				break;
		}			
	}
	echo "<div id='p2Points'>";
	echo "<h2> Player 2: $p2total </h2>";
	echo "</div>";
	
	whoWon($p1total,$p2total);
}

function whoWon($p1total, $p2total){
	echo "<div id='won'>";
	if($p1total <= 21 && $p2total <= 21){
		if($p1total<$p2total){
			echo "<h2> Player 2 Wins</h2>";
		}elseif($p1total>$p2total){
			echo "<h2> Player 1 Wins</h2>";
		}elseif($p1total == $p2total){
		echo "<h2>Draw</h2>";
		}
	}elseif($p1total > 21 && $p2total > 21){
		echo "<h2> You Both Lose</h2>";
	}elseif($p1total>21 && $p2total<=21){
		echo "<h2> Player 2 Wins</h2>";
	}elseif($p1total<=21 && $p2total>21){
		echo "<h2> Player 1 Wins</h2>";
	}
	echo "</div>";
}
?>
