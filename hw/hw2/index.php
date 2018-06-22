<!--  Homework 2
	Patrick Gonzalez
	6/21/18 -->

<?php
	include "inc/functions.php";
?>

<!DOCTYPE html>
<html>
<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <title>21</title>
		<style>
			@import url("css/styles.css");
		</style> 
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        <div id="main">
			<?php
				play();
			?>
			
			<form>
				<input type="submit" value="Deal" />
			</form>
		</div>
    </body>
    <!-- closing body -->
</html>