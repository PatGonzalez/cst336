<!--Lab 6-->
<!--Patrick Gonzalez-->
<!--7/8/28-->

<?php 
    // Lesson 4
    session_start();
    
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    if(!isset($_SESSION['adminName']))
    {
        header("Location:login.php");
    }
    
    // Lesson 4.2
    function displayAllProducts(){
        global $conn;
        
        $sql=   "SELECT *
                FROM om_product
                ORDER BY productId";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }
?>

<!DOCTYPE html>
<html>

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <title>Ottermart Admin Page</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"  /> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        
        <!--Font style-->
        <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
        
        <script>
            function confirmDelete(){
                return confirm("Are you sure you want to delete the product?");
            }
        </script>
        
        <!--<img src="img/storeShelf.jpg">-->
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        
        <div id="form">
            <h1>Ottermart Admin Page: Display Products</h1>
            
            <h3>Welcome <?=$_SESSION['adminName']?></h3><br/>
            
            <!--lesson 5-->
            <form action="addProduct.php">
                <input type="submit" class='btn btn-secondary' id="beginning" name="addproduct" value="Add Product"/>
            </form>
            
            <form action="logout.php">
                <input type="submit" class='btn btn-secondary' id="beginning" value="Logout"/>
            </form>
             <br/>
            
            <?php
                // lesson 4.2
                $records=displayAllProducts();
                            echo "<table class='table table-hover'>";
                            echo "<thead>
                                        <tr>
                                            <th scope='col'>ID</th>
                                            <th scope='col'>Name</th>
                                            <th scope='col'>Description</th>
                                            <th scope='col'>Price</th>
                                            <th scope='col'>Update</th>
                                            <th scope='col'>Remove</th>
                                        </tr>
                                    </thead>";
                                    
                            echo "<tbody>";
                            foreach($records as $record){
                                echo "<tr>";
                                echo "<td>".$record['productId']."</td>";
                                echo "<td>".$record['productName']."</td>";
                                echo "<td>".$record['productDescription']."</td>";
                                echo "<td>".$record['price']."</td>";
                                echo "<td><a class='btn btn-primary' href='updateProduct.php?productId=".$record['productId']."'>Update</a></td>";
                                
                                echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                                echo "<input type='hidden' name='productId' value=".$record['productId']." />";
                                echo "<td><input type='submit' class='btn btn-danger' value='Remove'></td>";
                                echo "</form>";
                            }
                            echo "</tbody>";
                            echo"</table>";
            ?>
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