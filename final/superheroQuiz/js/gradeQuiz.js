
$(document).ready(function(){
    

    $("form").submit(function(event) {
        
        event.preventDefault();
        
        //Get answers
        var answer1 = $("input[name='question1']");
        
        var realAnswer = $record['name'];
        
        console.log(answer1);
        
        //Checks if answers are correct
        // Question 1
        if(answer1 == realAnswer){
            correctAnswer($("#question1-feedback"));
        }else{
            incorrectAnswer($("#question1-feedback"));
        }
        
        $("#question1-feedback").append("The answer is <strong>realAnswer</strong>");
        
        $("input[type='submit']").css("display","none");

        //Submits and stores score, retrieves average score
        // Lesson 7
        
        
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