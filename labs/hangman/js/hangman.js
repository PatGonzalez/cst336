var selectedWord="";
var selectedHint="";
var board=[];
var guessedWords;
var tests = "test";
var remainingGuesses=6;
var words=[{word: "snake", hint: "It's a reptile"},
            {word: "monkey", hint: "It's a mammal"},
            {word: "beetle", hint: "It's an insect"}];

// console.log(words[0]);

// lesson 2.3
// Creating an array of available letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


if(sessionStorage.getItem('guessedWords')){
    guessedWords = JSON.parse(sessionStorage.getItem('guessedWords'));
}else{
    guessedWords=[];
}

// Linteners ///////////////////////////////////
window.onload = startGame();

// Handelers ///////////////////////////////////

// // lesson 2.2
// $("#letterBtn").click(function(){
//     var boxVal = $("#letterBox").val();
//     console.log("You pressed the button and it had the value: " + boxVal);
// })

// lesson 2.5
$(".letter").click(function(){
    // console.log($(this).attr("id"));
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

//lesson 4.3 
$(".replayBtn").on("click", function(){
    // localStorage.setItem('guesses',selectedWord);
    location.reload(true);
});

$(".hint").click(function(){
    // $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    showHint(true);
    remainingGuesses -= 1;
    updateMan();
    disableButton($(this));
});

// Functions ///////////////////////////////////

function startGame(){
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
    createHint();
    printGuessedWords();
}
// lesson 1.2
// var  randomInt = Math.floor(Math.random()*words.length);
// selectedWord= words[randomInt];

//FIll the board with underscores
// Lesson 1.4
function initBoard(){
    for(var letter in selectedWord){
        board.push("_");
    }
}

function pickWord(){
    var  randomInt = Math.floor(Math.random()*words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function updateBoard(){
    $("#word").empty();
    
    // for(var letter of board){
    //     document.getElementById("word").innerHTML += letter + " ";
    // }
    for(var i = 0; i<board.length; i++){
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br/>");
    // $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    
}

function createHint(){
    $("#hint").append("<button class='hint btn btn-success'>" + 'Hint' + "</button>");
    
    $("#hint").append("<br/>");
}

function showHint(selected){
    if(selected){
        $("#hint").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    }
}


// //lesson 1.5
// initBoard();
//     for(var letter of board){
//         document.getElementById("word").innerHTML += letter + " ";
//     }

// lesson 2.4
// Creates the letters inside the letters div
function createLetters(){
    for(var letter of alphabet){
        $("#letters").append("<button  class='letter btn btn-success' id='"+letter+"'>"+letter+"</button>");
    }
}

// lesson 3.1
// CHeck to see if the selected letter exists in the selectedWord
function checkLetter(letter){
    var positions = new Array();
    
    //Put all the positions the letter exists in an array
    for(var i = 0; i<selectedWord.length; i++){
        // console.log(selectedWord)
        if(letter==selectedWord[i]){
            positions.push(i);
        }
    }
    
    //Lesson 3.2
    if(positions.length > 0){
        updateWord(positions, letter);
        
        //check to see if this is a winning guess
        if(!board.includes('_')){
            
            endGame(true);
            
        }
    }else{
        remainingGuesses -= 1;
        updateMan();
    }
    
    if(remainingGuesses <= 0){
        endGame(false);
    }
}

//Lesson 3.3
// Update the current word then calls for a board update
function updateWord(positions, letter){
    for(var pos of positions){
        board[pos] = letter;
    }
    
    updateBoard();
}

//lesson 4.1
// Calculate and update the image for our stick man
function updateMan(){
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

//lesson 4.2
//Ends the game by hiding game divs and displaying the win or lose divs
function endGame(win){
    $("#letters").hide();
    
    if(win){
        $('#won').show();
        guessedWords.push(selectedWord);
        sessionStorage.setItem('guessedWords', JSON.stringify(guessedWords));
    }else{
        $('#lost').show();
    }
}

//lesson 5.2
// DIsables the button and changes the style to tell the user it's disabled
function disableButton(btn){
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger")
}


function printGuessedWords(){
    // document.getElementById("guessedWords").innerHTML = sessionStorage.getItem('guesses');
    
    
    if(guessedWords.length>0){
        $("#guessedWords").append("Guessed Words:");
        $("#guessedWords").append("<br/>");
        for(var word of guessedWords){
            $("#guessedWords").append("<span class='guessedWords'>" + word + "</span>");
            $("#guessedWords").append("<br/>");
        }
    }
}