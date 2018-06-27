<!--Homework 3
    Patrick Gonzalez
    6/25/18 -->

<?php
    include 'functions.php';
    
    session_start();
    
     // Create an array in the session to hold our survey info
    if(!isset($_SESSION['info'])){
        $_SESSION['info'] = array();
    }
    
    if(isset($_GET['query'])){
        $info=array();
        $info['fName']=$_GET['infoFname'];
        $info['lName']=$_GET['infoLname'];
        $info['genre']=$_GET['infoGenre'];
        $info['type']=$_GET['infoType'];
        $info['how']=$_GET['infoHow'];
    }
    
    // // CHeck to see if the form is submitted
    // if(isset($_POST['query'])){
    //     $info=array();
    //     $info['fName']=$_GET['infoFname'];
    //     $info['lName']=$_GET['infoLname'];
    //     $info['genre']=$_GET['infoGenre'];
    //     $info['type']=$_GET['infoType'];
    //     $info['how']=$_GET['infoHow'];
    // }
    
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
        <?php
            displaySurvey();
        ?>
        
        <!-- This is the footer -->
        <!-- The footer goes inside the body but not always -->
        <footer>
            
            
        </footer>
        <!-- closing footer -->
        
    </body>
    <!-- closing body -->

</html>