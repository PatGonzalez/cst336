$(document).ready(function(){
    
    var score = 0;
    $("form").submit(function(event) {
        
        event.preventDefault();
        
        //Get answers
        var answer1 = $("input[name='question1']").val().trim();
        var answer2 = $("input[name='question2']").val().toLowerCase().trim();
        
        
        console.log(answer1);
        console.log(answer2);
        
        //Checks if answers are correct
        // Question 1
        if(answer1 == "1994"){
            correctAnswer($("#question1-feedback"));
        }else{
            incorrectAnswer($("#question1-feedback"));
        }
        
        $("#question1-feedback").append("The answer is <strong>1994</strong>");
        
       
        // Question 3
        if(answer2 == "miguel lara"){
            correctAnswer($("#question2-feedback"));
        }else{
            incorrectAnswer($("#question2-feedback"));
        }
        
        $("#question2-feedback").append("The answer is <strong>Miguel Lara</strong>");
        
        
        //Displays quiz score
        $("#score").html(score);
        
        $("input[type='submit']").css("display","none");

        //Submits and stores score, retrieves average score
        // Lesson 7
        $.ajax({
            type : "post",
            url  : "submitScores.php",            
            dataType : "json",
            data : {"score" : score },            
            success : function(data){
                console.log(data);
                $("#attempts").html(data.attempts);
                
                $("#lastScore").html(data.lastScore);
                
                $("#feedback").css("display","block");
               
                $("input[type='submit']").css("display","");
                
            },
            complete: function(data,status) { //optional, used for debugging purposes
               // alert(status);
            }

        });//AJAX 
        
    }); //formSubmit
    
    //Styles a question as answered correctly
    function correctAnswer(questionFeedback){
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
        score++;
    }

    //Styles a question as answered incorrectly
    function incorrectAnswer(questionFeedback){
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
    }
    
}); //documentReady       