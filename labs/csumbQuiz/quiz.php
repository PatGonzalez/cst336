<form>
    <!--Question 1-->
    What year was CSUMB founded? 
    <input type="text" name="question1" size="5" /><br />
    <div id="question1-feedback" class="answer"></div><br />

    <!--Question 2-->
    What is the name of CSUMB's mascot?<br />
    <input type="radio" name="question2" id="q2-1"  value="A"/><label for='q2-1'>Otto <br />
    <input type="radio" name="question2" id="q2-2"  value="B"/><label for='q2-2'>Albus <br />
    <input type="radio" name="question2" id="q2-3"  Value="C"/><label for='q2-3'>Monte Rey <br />
    <div id="question2-feedback" class="answer"></div><br />
    
    <!--Question 3-->
    What is your professors name?
    <input type="text" name="question3" size="20" /><br />
    <div id="question3-feedback" class="answer"></div><br />
    
    <!--Question 4-->
    What was the CSUMB campus before it was converted into a college? <br/>
    <input type="radio" name="question4" id="q4-1"  value="A"/><label for='q4-1'>Art Museum <br />
    <input type="radio" name="question4" id="q4-2"  value="B"/><label for='q4-2'>Army Base <br />
    <input type="radio" name="question4" id="q4-3"  Value="C"/><label for='q4-3'>Air Port <br />
    <div id="question4-feedback" class="answer"></div><br />

    <input type="submit" value="Submit" />
    
    <!--Will display the "loading" or "spinning" animated gif-->
    <div id="waiting"></div>
</form>

<!--Will display the quiz score-->
<div id="scores"></div>