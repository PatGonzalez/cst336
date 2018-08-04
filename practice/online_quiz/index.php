<?php
    session_start();
    
    function displayQuiz(){
    //displays Quiz if session is active
    // lesson 4.1
    if(isset($_SESSION['email'])){
        include 'quiz.php';
    }else{
        header("Location: login.php");
    }
}
    
?>

<!DOCTYPE html>
<html>
<!--
First Website
and comment
in html
(comments can span multiple lines)
-->

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
         <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        
        <div id="rubric">
            <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The HTML form is properly created, including all elements</td>
      <td width="20" align="center">5</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>2</td>
      <td> Feedback per question (correct/incorrect) is displayed using jQuery, when submitting the quiz</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>The current attempt score is displayed when the quiz is submitted, using Javascript/jQuery</td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
       <td>4</td>
       <td>An AJAX call inserts/updates a record in the database, storing the last score and the number of attempts</td>
       <td align="center">15</td>
     </tr>
    <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>The Previous Attempt Score is properly displayed next to the Current Attempt Score</td>
      <td width="20" align="center">15</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>The Total Number of Attempts is properly displayed</td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table> 
        </div>
        
        <br/><br/>
        
        <div class="user-menu">
            <?php echo "Welcome ".$_SESSION['email']."! ";?>     
        </div>
        
        <!--display quiz-->
        <div id="quiz">
            <?=displayQuiz()?>
            
            <div id="feedback">
                <h2>Your final score is <span id="score">score</span></h2>
                
                <h2>Your last score was <span id="lastScore">lastScore</span></h2>
                
                You've taken this quiz <strong id="attempts"></strong> time(s). <br/><br/>
                
               
            </div>
        </div>
        
        <script type="text/javascript" src="js/gradeQuiz.js"></script>
    </body>
    <!-- closing body -->

</html>