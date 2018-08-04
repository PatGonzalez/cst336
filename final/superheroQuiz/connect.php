<?php

function getDBConnection() {
    
    //C9 db info
    $host = "localhost";
    $dbName = "final";
    $username = "root";//getenv("C9_USER");
    $password = "";
    
    
    try {
        //Creates a database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
       echo "Problems connecting to database!";
       exit();
    }
    
    
    return $dbConn;
}

?>