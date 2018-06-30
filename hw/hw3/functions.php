<?php
   function displayResults(){
      
      if($_GET['infoFname'] != ""){
         echo "Hello " .$_GET['infoFname']. ",";
      }
      
      switch($_GET['infoGenre']){
         case "pop":
               echo "<p>Did you know that The Chainsmokers will be playing at the <br/>
                     Hollywood Palladium in Hollywood, CA on Tue, Jul 24, 2018 at 8:00 PM.</p>";
                     
               if($_GET['infoType']== "Active" or $_GET['infoType'] == "Both"){
                  echo "This might be your chance to dance the night away!";
               }
               break;
         case "rock":
               echo "<p>Did you know that Imagine Dragons will be playing at <br/>
                     The Forum Los Angeles in Inglewood, CA on Sat, Jul 21, 2018 at 7:00 PM.</p>";
                     
               if($_GET['infoType']== "Active" or $_GET['infoType'] == "Both"){
                  echo "This might be your chance to rock out!";
               }
               break;
         case "edm":
               echo "<p>Did you know that Zedd  will be playing at the <br/>
                     Los Angeles State Historic Park in Los Angeles, CA on Tue, Jul 03, 2018 at 5:00 PM.</p>";
                     
               if($_GET['infoType']== "Active" or $_GET['infoType'] == "Both"){
                  echo "This might be your chance to dance the night away!";
               }
               break;
         case "country":
               echo "<p>Did you know that Tim McGraw and Faith Hill will be playing at the <br/>
                     STAPLES Center in Los Angeles, CA on Tue, Sat, Jul 21, 2018 at 7:30 PM.</p>";
                     
               if($_GET['infoType']== "Active" or $_GET['infoType'] == "Both"){
                  echo "Better go and dust off those boots!";
               }
               break;
      }
       
   }
?>