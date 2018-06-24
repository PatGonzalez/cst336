<!-- Lab 3 Carousel
Patrick Gonzalez
6/22/18 -->

<!--assigns the location of the image to a variable.-->
<?php
	$backgroundImage = "img/sea.jpg";
	
	// API call goes here
	if(empty($_GET['keyword'])){ //<!--Validate that the user types a keyword or selects a category from the dropdown menu, otherwise, do not display the carousel.-->
	    echo "<br/><br/>";
	    echo "<strong>! Please enter a keyword or select a category !</strong>";
	}
	elseif(isset($_GET['keyword'])){
	    echo "You searched for: ".$_GET['keyword'];
	    
	   // <!-- get the results of our Pixabay image search
	   //     returns an array which we will store in $imageURLs. -->
	    include 'api/pixabayAPI.php';
	    $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
	    
	   // check the contents of array 
	   // print_r($imageURLs);
	   
	   //  set the $backgroundImage with a random image from the images we collected.
	   $backgroundImage = $imageURLs[array_rand($imageURLs)];
	}
?>

<!DOCTYPE html>

<html>

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
		
        <title>Image Carousel</title>
		
		<!-- link both the CSS and JS libraries for Bootstrap.-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">		
		
		<style>
		    /*<!-- include our own styles.css.  instead of using the <link> tag, let’s use the css @import feature.-->*/
			@import url("css/styles.css");
			/*<!--use the variable to set ‘background-image’ property of the body-->*/
			body{
				background-image: url(<?=$backgroundImage?>);
				height: 100%;
				background-position: center;
                /*background-repeat: no-repeat;*/
                background-size: cover;
			}
		</style>
	</head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        <br/><br/>
        <!-- provide instructions to the user, but only if they have not submitted a keyword. --> 
        <?php
            if(!isset($imageURLs)){
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
            }else{
                //Display Carousel
        ?>
            
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators Here -->
                 <ol class="carousel-indicators">
                    <?php
                        for($i=0;$i<7;$i++){
                            echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                            echo ($i==0)? "class='active'": "";
                            echo "></li>";
                        }
                    ?>
                  </ol>

                <!-- Wrapper for images -->
                <div class="carousel-inner" role="listbox">
                    <?php
                        for($i=0;$i<7;$i++){
                            do{
                                $randomIndex = rand(0,count($imageURLs));
                            }while(!isset($imageURLs[$randomIndex]));
                            
                            echo '<div class="item ';
                            echo ($i==0)?"active":"";
                            echo '">';
                            echo '<img src="'.$imageURLs[$randomIndex].'">';
                            echo '</div>';
                            unset($imageURLs[$randomIndex]);
                        }
                    ?>
                </div>
                
                <!-- Controls Here -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
            </div>
            
            <?php
                 }//end else
            ?>
            
            <br/>
            

        
        
		<!-- HTML form goes here -->
		<!--This form is how the user will query the Pixabay API to collect the images for the slideshow.-->
		<form>
		      <input type="text" name="keyword" placeholder="Keyword">
		      
		      <br/>
		      <!-- two radio buttons for users to select the images layout, either Vertical or Horizontal. -->
		      <input type="radio" id="lhorizontal" name="layout" value="horizontal">
		      <label for="Horizontal"></label>
		      <label for="lhorizontal"> Horizontal</label>
		      
		      <input type="radio" id="lvertical" name="layout" value="vertical">
		      <label for="Vertical"></label>
		      <label for="lvertical">Vertical</label>
		      
		      <br/>
		      <!-- dropdown menu with at least five different categories to search,
		           If a category is selected, it should search for it, otherwise, it should search for the keyword typed.-->
		      <select name="keyword">
		          <option value="">Select One</option>
		          <option value="desert">Desert</option>
		          <option>Flowers</option>
		          <option>Ocean</option>
		          <option>Fish</option>
		      </select>
		      
		      <br/><br/><br/>
		      <input type="submit" value="Submit"/>
		</form>
		<!-- link both the CSS and JS libraries for Bootstrap.-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>
    <!-- closing body -->
</html>