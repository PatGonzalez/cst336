<?php
        // THe actual survey forum code
        echo '<form>';
            echo '<br/><br/>';
            //<!--collect name-->
            echo '<label for="infoFname">First Name:</label>';
            echo '<input id="infoFname" type="text" name="infoFname">';
            echo '<label for="infoLname">Last Name:</label>';
            echo '<input id="infoLname" type="text" name="infoLname">';
            
            echo '<br/><br/>';
            
            $i = checked;
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
            echo '<input type="submit" value="Submit" class="btn btn-default">';
        echo '</form>';
        
        
        
        
        
        
        
        
        
        
        
        
        
            
            // How do you listen to music
            <fieldset>
                <legend>How do you listen to muisc?</legend>
                <input id="fm" type="checkbox" name"infoHow" value="fm" <?php if($_GET['infoHow'] == "fm") echo 'checked = "checked"';?> >
                <label for="fm">FM Radio</label><br>
                
                <input id="intR" type="checkbox" name"infoHow" value="intR" <?php if($_GET['infoHow'] == "intR") echo "checked = checked";?>>
                <label for="intR">Internet Radio</label><br>
                
                <input id="buy" type="checkbox" name"infoHow" value="buy" <?php if($_GET['infoHow'] == "buy") echo "checked = checked";?>>
                <label for="buy">Buy Cds or Mps</label><br>
                
                <input id="tor" type="checkbox" name"infoHow" value="tor" <?php if($_GET['infoHow'] == "tor") echo "checked = checked";?>>
                <label for="tor">Torrent</label><br>
            </fieldset>
            
        
        ?>