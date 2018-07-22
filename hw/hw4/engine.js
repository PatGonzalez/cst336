// variable used to save object
var monkey_01;
var gameTimer;
var output;
var numHits =0;
	
// All the code to initialize the game, which always happens immediately after the page is loaded.
function init(){
	//monkey_01 = document.getElementById('monkey_01');
	monkey_01 = $('#monkey_01');
	
	//output = document.getElementById('output');
	output = $('#output')[0];
	
	gameTimer = setInterval(gameloop, 50);
	
	placeMonkey();
}

/* Any code in here is repeated every second.
	Take the verticle location of the element that is set in the init(), but first convert the string x + 'px' to an integer. 
	Then subtract it by 10.
	Then change the top value of monkey_01 to equal the new y value you calculated, which is always 5 less than its current value.
	Reset the monkey's horizontal position to a random value every time 	the monkey's vertical position is reset to the bottom.*/
function gameloop(){
	/* output.innerHTML = output.innerHTML + '*'; */ //test the loop
	//var y = parseInt(monkey_01.style.top)-10;
	var y = parseInt(monkey_01.css('margin-top'))-10;
	var y2;
	//output.innerHTML = y;
	
	//output.innerHTML = y; //test the decrementing by 5 loop
	
	if(y < -100){  
		placeMonkey();
	} else{
		//monkey_01.style.top = y + 'px';
		y2 = y + 'px';
		monkey_01.css('margin-top', y2);
	} 
	
}

/* Placing the monkey in gameWindow.
Set the monkey's left property to a random number between 0 and 420px.
Java-script to place the monkey image in the center of the screen.
position the monkey at the bottom of gameWindow by setting its top property to 350px. */
function placeMonkey(){
	var x = Math.floor(Math.random()*421);
	var x2 = x + 'px';
	//monkey_01.style.left = x + 'px';
	//monkey_01.style.top = '350px';
	
	monkey_01.css('margin-left', x2);
	monkey_01.css('margin-top', '350px');
}

$("monkey_01").mousedown(function(){
	hitMonkey();
});

  /* Have the monkey dissappear when it is clicked on, and start over from a new position. */
function hitMonkey(){
	/* output.innerHTML = 'No animals are harmed in the playing of this game.'; */
	numHits++;
	/* output.innerHTML = numHits; // Test hits */
	if(numHits==3){
		alert('You Win!');
		clearInterval(gameTimer);
	}
	placeMonkey();
}