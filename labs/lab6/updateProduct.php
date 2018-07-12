<?php
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    if(isset($_GET['productId'])){
        $product=getProductInfo();
    }
    
    function getProductInfo(){
        global $conn;
        
        $sql =  "SELECT *
                FROM om_product
                WHERE productId = ". $_GET['productId'];
                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record=$stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    function getCategories($catId){
        global $conn;
        
        $sql = "SELECT catId, catName
                FROM om_category
                ORDER BY catName";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<option ";
            echo ($record['catId'] == $catId)?"selected": "";
            echo " value='" .$record['catId'] ."'>".$record['catName']."</option>";
        }
    }
    
    if(isset($_GET['updateProduct'])){
        $sql = "UPDATE om_product
                SET productName = :productName,
                    productDescription = :productDescription,
                    productImage = :productImage,
                    price = :price,
                    catId = :catId
                WHERE productId = :productId";
                
        $nameParameters=array();
        $nameParameters[':productName']=$_GET['productName'];
        $nameParameters[':productDescription']=$_GET['description'];
        $nameParameters[':productImage']=$_GET['productImage'];
        $nameParameters[':price']=$_GET['price'];
        $nameParameters[':catId']=$_GET['catId'];
        $nameParameters[':productId']=$_GET['productId'];
        
        $statement=$conn->prepare($sql);
        $statement->execute($nameParameters);
        
        echo "Product Was Updated Sucessfully";
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
            <h1>Ottermart Admin Page: Update Product</h1>
            
            <nav>
                <a href="admin.php" id="current-page">Back to Admin Page</a>
            </nav>
            
            <!--lesson 6.3-->
            <form>
                <input type="hidden" name="productId" value="<?=$product['productId']?>"/>
                <strong>Product Name</strong> <input type="text" class="form-control" name="productName" value="<?=$product['productName']?>"><br>
                <strong>Description</strong> <textarea name="description" class="form-control" cols=50 rows=4><?=$product['productDescription']?></textarea/><br/>
                <strong>Price</strong> <input type="text" class="form-control" name="price" value="<?=$product['price']?>"><br/>
                <strong>Category</strong>   <select name="catId" class="form-control">
                                                <option>Select One</option>
                                                <?php getCategories($product['catId']); ?>
                                            </select><br/>
                <strong>Set Image Url</strong> <input type="text" name="productImage" class="form-control" value="<?=$product['productImage']?>"><br/>
                <input type="submit" name="updateProduct" class='btn btn-primary' value="Update Product">
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