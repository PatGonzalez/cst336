<?php
session_start();
include 'connect.php';
$connect = getDBConnection();
//Checking credentials in database
// Lesson 3.2
$sql = "SELECT * FROM prectice1_quiz
		WHERE email = :email";
		
$stmt = $connect->prepare($sql);
$data = array(":email" => $_POST['email']);
$stmt->execute($data);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
//redirecting user to quiz if credentials are valid
// Lesson 3.2.2
if(isset($user['email'])){
    $_SESSION['email'] = $user['email'];
    header('Location: index.php');
} else {
    echo "The values you entered were incorrect. 
        <a href='login.php' >Retry</a>";
    
}
?>