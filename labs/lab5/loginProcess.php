<?php

    session_start();
    
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    // following sql prevents sql injection by avoiding using single quotes
    $sql = "SELECT *
            FROM om_admin
            WHERE username = :username
            AND password = :password";
            
    $np = array();
    $np[":username"] = $usernmae;
    $np[":password"] = $password;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting one single record
    
    if(empty($record)){
        $_SESSION['incorrect'] = true;
        header("Location:index.php");
    }else{
        $_SESSION['incorrect'] = false;
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        header("Location:admin.php");
    }
?>