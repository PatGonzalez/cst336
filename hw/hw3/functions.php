<?php
    // function displaySubmission(){
    //     foreach($_SESSION['music']){
            
    //     }
    // }
    function displayResults(){
        global $info; 
        
        if(isset($info)){
            foreach($info as $surveyInfo){
                $infoFname = $info['fName'];
                $infoLname = $info['lName'];
                $infoGenre = $info['genre'];
                $infoType = $info['infoType'];
                $infoHow = $info['infoHow'];
            }
        }
        print_r($surveyInfo);
        
        // Check to see if there is information already collected from the survey
        // if(isset($_SESSION['muisc'])){
        //     foreach($_SESSION['muisc'] as $surveyInfo){
        //         $infoFname = $surveyInfo['Fname'];
        //         $infoLname = $surveyInfo['Lname'];
        //         $infoGenre = $surveyInfo['Genre'];
        //         $infoType = $surveyInfo['Type'];
        //         $infoHow = $surveyInfo['How'];
                
        //         print_r($surveyInfo);
        //     }
        // }
    }
    function displaySurvey(){
        
        
        // THe actual survey forum code
        echo '<form>';
            echo '<br/><br/>';
            //<!--collect name-->
            echo '<label for="infoFname">First Name:</label>';
            echo '<input id="infoFname" type="text" name="infoFname" placeholder="First Name">';
            echo '<label for="infoLname">Last Name:</label>';
            echo '<input id="infoLname" type="text" name="infoLname">';
            
            echo '<br/><br/>';
            //<!--Favorite music genre-->
            echo '<fieldset>';
                echo '<legend>Favrite Music Genre:</legend>';
                echo '<input id="pop" type="radio" name="infoGenre" value="pop">';
                echo '<label for="pop">Pop</label><br>';
                
                echo '<input id="rock" type="radio" name="infoGenre" value="rock">';
                echo '<label for="rock">Rock</label><br>';
                
                echo '<input id="edm" type="radio" name="infoGenre" value="edm">';
                echo '<label for="edm">EDM</label><br>';
                
                echo '<input id="country" type="radio" name="infoGenre" value="country">';
                echo '<label for="country">Country</label><br>';
            echo '</fieldset>';
            
            echo '<br/><br/>';
            //<!--Style of listener-->
            echo '<label for="infoType">What type of listener are you?<br/>Active=Dancer / Passive=Chill / Both: </label>';
            echo '<select id="infoType" name="select">';
               echo ' <option value="1">Active</option>';
               echo ' <option value="2">Passive</option>';
               echo ' <option value="3">Both</option>';
            echo '</select>';
            
            echo '<br/><br/>';
            //<!--How do you listen to music-->
            echo '<fieldset>';
                echo '<legend>How do you listen to muisc?</legend>';
                echo '<input id="fm" type="checkbox" name"infoHow" value="fm">';
                echo '<label for="fm">FM Radio</label><br>';
                
               echo ' <input id="intR" type="checkbox" name"infoHow" value="intR">';
                echo '<label for="intR">Internet Radio</label><br>';
                
               echo ' <input id="buy" type="checkbox" name"infoHow" value="buy">';
               echo ' <label for="buy">Buy Cds or Mps</label><br>';
                
               echo ' <input id="tor" type="checkbox" name"infoHow" value="tor">';
               echo ' <label for="tor">Torrent</label><br>';
            echo '</fieldset>';
            
            echo '<br/><br/>';
            //<!--SUbmit-->
            echo '<input type="submit" value"Submit"/>';
        echo '</form>';
    }
?>