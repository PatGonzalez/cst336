<!--Homework 3
    Patrick Gonzalez
    6/25/18 -->

<?php
    include 'functions.php';
     
    // Verify that the entire survey has been filled out
   foreach($_GET as $verify){
      if($verify ==""){
          echo "Please fill out entire survey!";
      }
   }
   
    // if it is filled out display the results
   if(isset($_GET)){
       echo "<div id=results> ";
       displayResults();
       echo "</div>";
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
        <title>Music Survey</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Concert+One');
            
            @import url("css/styles.css");
        </style>
        
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        <header> 
            <div id="grad1">
			    <h1> Music Survey  </h1>
			</div>
		</header>
		
		<hr>
		
		<br/>
         <!--The Survey -->
        <form>
            <br/><br/>
            <!--collect name-->
            <label for="infoFname">First Name:</label>
            <input id="infoFname" type="text" name="infoFname" value="<?=$_GET['infoFname']?>">
            
            <label for="infoLname">Last Name:</label>
            <input id="infoLname" type="text" name="infoLname" value="<?=$_GET['infoLname']?>">
        
            <br/><br/>
            
            <!--Favorite music genre-->
            <fieldset>
                <legend>Favrite Music Genre:</legend>
                <input id="pop" type="radio" name="infoGenre" value="pop" <?php if($_GET['infoGenre'] == "pop") echo "checked";?> > 
                <label for="pop">Pop</label><br>
                
                <input id="rock" type="radio" name="infoGenre" value="rock" <?php if($_GET['infoGenre'] == "rock") echo "checked";?> >
                <label for="rock">Rock</label><br>
                
                <input id="edm" type="radio" name="infoGenre" value="edm" <?php if($_GET['infoGenre'] == "edm") echo "checked";?> >
                <label for="edm">EDM</label><br>
                
                <input id="country" type="radio" name="infoGenre" value="country" <?php if($_GET['infoGenre'] == "country") echo "checked";?> >
                <label for="country">Country</label><br>
            </fieldset>
            
            <br/><br/>
            
            <!--Style of listener-->
            <label for="infoType">What type of listener are you?<br/>Active=Dancer / Passive=Chill: </label>
            <select id="infoType" name="infoType">
                <option value=" "> <?=$_GET['infoType']?> </option>
                <option value="Active">Active</option>
                <option value="Passive">Passive</option>
                <option value="Both">Both</option>
            </select>
            
            <br/><br/>
        
            What is your perfered method of listing to Music?
            <input list="infoHow" name="infoHow" value="<?=$_GET['infoHow']?>">
            <datalist id="infoHow" >
                <option value="FM Radio">
                <option value="Internet Radio">
                <option value="Buy Cds or Mps">
                <option value="Torrent">   
            </datalist>
            
            <br/><br/>
            <!--SUbmit-->
            <button type="submit" value="Submit">Submit</button>
        </form>
        
        
         <!--This is the footer -->
         <!--The footer goes inside the body but not always -->
         <br/><br/><br/><br/>
        <footer>
            <hr id="hr_footer">
                CST 336 Internet Programming. 2018&copy; Gonzalez<br />
                <strong>Disclaimer:</strong> The information in this webpage is fictious.<br />
                It is used for academic purposes only.
                
                <figure id="csumb">
                    <img src="img/csumb_logo.png" alt="CSUMB Logo">
                </figure>
                
                
            <hr id="sources">
                <br/>Background provided by:
                <br/><a href="https://www.gfxtra.com/vectors/vector-background/vector-abstract-backgrounds/903608-multicolored-notes-and-butterflies-vector-illustration-15-x-eps.html/">
                        Notes and butterflies music background vector 09 EPS format</a>
                 <br/>By Starder
                 <br/>Vector Background / Vector Music
                 <br/># Butterflies, Music, notes
        </footer>
        <!-- closing footer -->
        
    </body>
    <!-- closing body -->

</html>