<?php
    //You need these to lines inorder to call upon $conn and connect to the database
   
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    // lesson 5.3
    function getCategories(){
        global $conn;
        
        $sql =  "SELECT catId, catName
                FROM om_category
                ORDER BY catName";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<option value='".$record["catId"]."'>".$record['catName']."</option>";
        }
    }
    
    // lesson 5.4
    if(isset($_GET['submitProduct'])){
        $productName=$_GET['productName'];
        $productDescription=$_GET['description'];
        $productImage=$_GET['productImage'];
        $productPrice=$_GET['price'];
        $catId=$_GET['catId'];
        
        $sql =  "INSERT INTO om_product
                (productName, productDescription, productImage, price, catId)
                VALUES (:productName, :productDescription, :productImage, :price, :catId)";
        
        $nameParameters=array();
        $nameParameters[':productName']=$productName;
        $nameParameters[':productDescription']=$productDescription;
        $nameParameters[':productImage']=$productImage;
        $nameParameters[':price']=$productPrice;
        $nameParameters[':catId']=$catId;
        
        $statement=$conn->prepare($sql);
        $statement->execute($nameParameters);
        
        echo "Product Was Added Sucessfully";
    }
?>


<!DOCTYPE html>
<html>

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <title>Ottermart Admin Page</title>
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
            <h1>Ottermart Admin Page: Add Product</h1>
            
            <nav>
                <a href="admin.php" id="current-page">Back to Admin Page</a>
            </nav>
            
            <!--lesson 5-->
            <form>
                <strong>Product Name</strong> <input type="text" class="form-control" name="productName"><br>
                <strong>Description</strong> <textarea name="description" class="form-control" cols=50 rows=4></textarea/><br/>
                <strong>Price</strong> <input type="text" class="form-control" name="price"><br/>
                <strong>Category</strong>   <select name="catId" class="form-control">
                                                <option value="">Select One</option>
                                                <?php getCategories(); ?>
                                            </select><br/>
                <strong>Set Image Url</strong> <input type="text" name="productImage" class="form-control"><br/>
                <input type="submit" name="submitProduct" class='btn btn-primary' value="Add Product">
            </form>
            
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