<!--
Lab 5
by Patrick Gonzalez
7/2/18

-->

<?php

    	
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
   // $conn = getDatabaseConnection();
    
    // Lesson 3.4
    function displayCategories(){
        global $conn;
        
        $sql = "SELECT catID, catName from om_category ORDER BY catName"; // SQL statment
        
        $stmt = $conn->prepare($sql); // This will send the sql you provided
        $stmt->execute(); // This will execute the SQL
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); // To save and use the results from the SQL
        
        //Since $records contains every single line from the table based off the sql statement created, 
        // we must go through each record using a foreach statement.
        foreach($records as $record){
            //To concatenate within an echo statement we use . rather than + and 
            // specify which columns from the database should be placed. Think of it as accessing from an array.
            echo "<option value='" .$record["catId"]. "'>" .$record["catName"]. "</option>";
        }
    }
    
    function displaySearchResults(){
        global $conn;
        
        if(isset($_GET['searchForm'])){
            echo "<h3>Products Found: </h3>";
            
            //Query below prvents SQL injection
            $namedParameters = array();
            
            $sql = "SELECT * FROM om_product WHERE 1";
            
            // Lesson 4: Seach for product name
            if(!empty($_GET['product'])){ //check whether user has typed somthing in the "product" tect box
                $sql .= " AND productName LIKE :productName";
                $namedParameters[":productName"] = "%" .$_GET['product'] . "%";
            }
            
            // Lesson 5: Search by category
            if(!empty($_GET['category'])){ //check whether user has selected a category
                $sql .= " AND catId = :categoryId";
                $namedParameters[":categoryId"] = $_GET['category'];
            }
            
            // Lesson 6: Search By price
            if(!empty($_GET['priceFrom'])){ //check whether user has typed somthing in 
                $sql .= " AND price >= :priceFrom";
                $namedParameters[":priceFrom"] = $_GET['priceFrom'];
            }
            
            if(!empty($_GET['priceTo'])){ //check whether user has typed somthing in 
                $sql .= " AND price <= :priceTo";
                $namedParameters[":priceTo"] = $_GET['priceTo'];
            }
            
            if(isset($_GET['orderBy'])){
                if($_GET['orderBy'] == "price"){
                    $sql .= " ORDER BY price";
                }
                else{
                    $sql .= " ORDER BY productName";
                }
            }

            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            
            foreach($records as $record){
                
                //we will send purchaseHistory.php the productId so the corresponding item will have the right history. 
                echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";
                
                echo $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "<br/><br/>";
            }
        }
    }    
?>

<!DOCTYPE html>
<html>

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <title>Ottermart Product Search</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"  />     
        
        <!--Font style-->
        <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
        
        <!--<img src="img/storeShelf.jpg">-->
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        
        <div id="form">
            <h1>Ottermart Product Search</h1>
            
            <form>
                Product: <input type="text" name="product" />
                <br/>
                Category: <select name="category">
                            <option value =""> Select One </option>
                            <?=displayCategories()?> 
                        </select>
                <br/>
                Price:  From <input type="text" name="priceFrom" size="7" />
                        To   <input type="text" name="priceTo" size="7" />  
                <br/>
                Order result by: 
                <br/>
                <input type="radio" name="orderBy" value="price" /> Price
                <br/>
                <input type="radio" name="orderBy" value="name" /> Name
                
                <br/> <br/>
                <input type="submit" value="Search" name="searchForm" class="button" />
            </form>
            <br/>
        </div>
        
        <div id="results">
        <?= displaySearchResults() ?>
        </div>
        
        
        <!-- This is the footer -->
        <!-- The footer goes inside the body but not always -->
        <footer>
            <hr id="hr_footer">
                CST 336 Internet Programming. 2018&copy; Gonzalez<br />
                <strong>Disclaimer:</strong> The information in this webpage is fictious.<br />
                It is used for academic purposes only.
                
                <figure id="csumb">
                    <img src="img/csumb_logo.png" alt="CSUMB Logo">
                </figure>
            
        </footer>
        <!-- closing footer -->
        
    </body>
    <!-- closing body -->

</html>