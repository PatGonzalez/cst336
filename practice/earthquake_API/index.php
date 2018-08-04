<?php 

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
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td> There is an event triggered when the value of any of the Form element changes</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>An AJAX call is properly executed when the value of any of the Form element changes
      </td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
       <td>4</td>
       <td>The list of Magnitudes and Places is properly updated</td>
       <td align="center">15</td>
     </tr>
    <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>At least five CSS rules are included</td>
      <td width="20" align="center">5</td>
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
        
        <form>
            Start Date
            <input type="date" name="Start"/><br />
            <div id="Start" class="answer"></div><br />

            End Date
            <input type="date" name="End" /><br />
            <div id="Start" class="answer"></div><br />

            Latitude
            <input type="text" name="Latitude"  /><br />
            <div id="Latitude" class="answer"></div><br />

            Longitude
            <input type="text" name="Longitude"/><br />
            <div id="Longitude" class="answer"></div><br />

            Radius
            <input type="text" name="Radius" /><br />
            <div id="Radius" class="answer"></div><br />

            Min Magnitude
            <input type="text" name="Magnitude"  /><br />
            <div id="Magnitude" class="answer"></div><br />

            
            <input type="submit" value="Submit" />
        </form>
        
        
        
      <script type="text/javascript" src="js/submit.js"></script>
    </body>
    <!-- closing body -->

</html>