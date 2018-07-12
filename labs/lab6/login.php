<!--Lab 6-->
<!--Patrick Gonzalez-->
<!--7/8/28-->

<?php
    session_start();
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
            <h1>Ottermart Admin Page: Login</h1>
            
            <!--lesson 2.1-->
            <form method="POST" action="loginProcess.php">
                Username: <input type="text" name="username"/><br/>
                Password: <input type="password" name="password"/><br/>
                
                <input type="submit" class='btn btn-primary' name="submitForm" value="Login!"/>
                
                <br/><br/>
                
                <?php
                    if($_SESSION['incorrect']){
                        echo "<p class = 'lead' id = 'error' style='color:red'>";
                        echo "<strong>Incorrect Username or Password!</strong></p>";
                    }
                ?>
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