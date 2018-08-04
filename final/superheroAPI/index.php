<!--Superhero Movie API-->
<!--Patrick gonzalez-->

<?php
    session_start();
    include 'connect.php';
    $connect = getDBConnection();
    
    function displayCategories(){
        global $connect;
        
        $sql = "SELECT id, name from superhero ORDER BY name"; // SQL statment
        
        $stmt = $connect->prepare($sql); // This will send the sql you provided
        $stmt->execute(); // This will execute the SQL
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); // To save and use the results from the SQL
        
        // $unique = [];
        //  foreach($records as $record){
        //     foreach($unique as $i){
        //         if($unique != $record){
        //             $unique.push($record);
        //         }
        //     }
        // }
        
    //     for($i = 0;$i < $records.length; $i++){
    //     if($unique.indexOf($records[$i]) == -1){
    //         $unique.push($records[$i]);
    //     }
    // }
        
        foreach($records as $record){
            echo "<option value='" .$record["id"]. "'id='name'>" .$record["name"]. "</option>";
        }
    }
    
    
    // // Had to comment out the code below to get what I have to run
    // function getAPI(){
    //     $.ajax({
    //         type: "get",
    //             url: "https://www.omdbapi.com",
    //             dataType: "json",
    //             data:{"t":$("name")},
                
    //             success: function(data, status){
    //                 $("#info").html(data["metadata"])
    //             },
        
    //     }); //ajax
        
    // }
?>

<!DOCTYPE html>
<html>

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        <form>
            Category: <select name="category">
                                <option value =""> Select One </option>
                                <?=displayCategories()?> 
                            </select>
                    <br/><br/>
                    
            <input type="button" value="Search Movies!">
            <br/><br/>
                    
            <input type="button" value="Search Details">
        </form>
        
        <div id="info"></div>
        
        <br/><br/>
        <table border="1" width="600" cellpadding="10">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#ffffff">
      <td>1</td>
      <td>The list of the superheroes in the dropdown menu is retrieved from the database (ordered alphabetically, no duplicates)<br></td>
      <td width="20" align="center">10</td>
    </tr> 
    <tr style="background-color:#ffffff">
      <td>2</td>
      <td>When clicking on the "Search Movies" button, the OMDB API is used to display the list of movies (<strong>poster</strong> and <strong>title</strong>) for the superhero selected<br></td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#ffffff">
      <td>3</td>
      <td> When clicking on the "Search Movies" button, the superhero selected is stored in a Session variable using AJAX<br></td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td> When clicking on the "See Search History" link, the superheroes whose movies have been searched are displayed within an iFrame</td>
      <td width="20" align="center">15</td>
    </tr>   
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td> When clicking on the "Superhero Details" button, an AJAX call is made to display all corresponding info (name, image, and pob)<br></td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>When clicking on the "Superhero Details" button, the name and images of the superhero's enemies are displayed<br></td>
      <td width="20" align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>       
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
        
    </body>
    <!-- closing body -->

</html>