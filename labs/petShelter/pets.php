<?php
    // lesson 3
	function getPetList(){
		include 'dbConnection.php';
		$conn = getDatabaseConnection("pets");
		
		$sql = "SELECT *
				FROM adoptees";
				
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$record = $stmt->fetchAll(PDO::FETCH_ASSOC); //expecting only one record
		
		return $record;
	}
	
    //lesson 4
	$pets = getPetList()
	//print_r($pets);
	
	foreach ($pets as $pet){
		echo "Name: ";
		echo "<a href='#' class='petLink' id='".$pet['id']."' >".$pet['name']. "</a><br/>";
		echo "Type: ".$pet['type']."<br/>";
		echo "<button id='".$pet['id']."' type='button' class='btn btn-primary petLink'>Adopt me!</button>";
		echo "<hr><br/>";
	}
	
	// lesson 6
	$(".petLink").click(function(){
		$.ajax({
			type: "GET",
			url: "api/getPetInfo.php",
			dataType: "json",
			data: {"id": $(this).attr('id')},
			success: function(data, status){
				//console.log(data);
				$("#petInfo").html("<img src='img/" + data.pictureURL + "'><br/>"+
									" Age: " + data.age + "<br/>" +
									" Breed: " + data.breed + "<br/>" +
									data.description);
			},
			complete: function(data, status){ //optional, used for debugging purposes
			alert(status);
				
			}
		}); //ajax
	}); //.getLink click
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
        
        
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        
        
        
        <!-- This is the footer -->
        <!-- The footer goes inside the body but not always -->
        <footer>
            
            
        </footer>
        <!-- closing footer -->
        
    </body>
    <!-- closing body -->

</html>