<!--superhero quiz-->
<!--patrick gonzlaez-->

<?php
    session_start();
    include 'connect.php';
    $connect = getDBConnection();
    
    $sql = "SELECT *
                FROM superhero
                ORDER BY RAND() 
                LIMIT 1";
                
    $stmt = $connect->prepare($sql); // This will send the sql you provided
    $stmt->execute(); // This will execute the SQL
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    function getSuperImg(){
        
        $image = $records["image"];
        echo  '<img src=img/"'.$image.'".png>';
        
    
    }
    
    function displayCategories(){
        global $connect;
        
        $sql = "SELECT id, name from superhero ORDER BY name"; // SQL statment
        
        $stmt = $connect->prepare($sql); // This will send the sql you provided
        $stmt->execute(); // This will execute the SQL
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); // To save and use the results from the SQL
        
        foreach($records as $record){
            echo "<option value='" .$record["id"]. "'name='question1' id='question1'>" .$record["name"]. "</option>";
        }
    }
?>

<!DOCTYPE html>
<html>

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
           
        <?=getSuperImg()?> 
       
         <br/>
         <div id="quiz">
          <form>
                Category: <select name="category">
                            <option value =""> Select One </option>
                            <?=displayCategories()?> 
                        </select>
                        
                <div id="question1-feedback" class="answer"></div><br />
       
                <input type="submit" value="Check Answer" />
                
                <!--Will display the "loading" or "spinning" animated gif-->
                <div id="waiting"></div>
            </form>
            </div>
                <br/>
                
        <br/><br/>
        <table border="1" width="600" cellpadding="10px">
            <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
             <tr style="background-color:#ffffff">
              <td>1</td>
              <td>A random image of a superhero is displayed when refreshing the page <br></td>
              <td width="20" align="center">15</td>
             </tr>     
             <tr style="background-color:#ffffff">
              <td>2</td>
              <td><p>The "real names" of the superheroes in the dropdown menu come from the database (without duplicates and in alphabetical order) <br>
                </p></td>
              <td width="20" align="center">15</td>
            </tr>     
             <tr style="background-color:#ffffff">
              <td>3</td>
              <td>An error message is displayed if the user clicks on the "Check Answer" button without selecting anything. <br></td>
              <td width="20" align="center">10</td>
            </tr>     
             <tr style="background-color:#ffffff">
              <td>4</td>
              <td>The right color-coded feedback (correct or incorrect) is displayed upon clicking on the "Check Answer" button <br></td>
              <td width="20" align="center">15</td>
            </tr>     
             <tr style="background-color:#ffffff">
              <td>5</td>
              <td>The number of times the real name for the specific superhero has been answered correctly and incorrectly is stored in the database, via AJAX (you'll need to create a new table, you decide the structure)<br></td>
              <td width="20" align="center">15</td>
            </tr>     
        
             <tr style="background-color:#FFC0C0">
              <td>6</td>
              <td>The updated number of times for total of correct and incorrect answers (for the specific superhero) is displayed, via AJAX <br></td>
              <td width="20" align="center">15</td>
            </tr>
             
             <tr style="background-color:#FFC0C0">
              <td>7</td>
              <td>The spinning images (indicating that data is being loaded) are displayed and replaced when the data is retrieved, via AJAX</td>
              <td width="20" align="center">5</td>
            </tr> 
        
             <tr style="background-color:#99E999">
              <td>8</td>
              <td>This rubric is properly included AND UPDATED</td>
              <td width="20" align="center">2</td>
            </tr>
                
             <tr>
              <td></td>
              <td>T O T A L </td>
              <td width="20" align="center">&nbsp;</td>
            </tr> 
          </tbody></table>
          
        <script type="text/javascript" src="js/gradeQuiz.js"></script>
    </body>
    <!-- closing body -->

</html>