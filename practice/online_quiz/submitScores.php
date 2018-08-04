<?php
session_start();
include 'connect.php';
$connect = getDBConnection();
$score = $_GET['score'];
echo $score;

//Lesson 6
//Adding new score to database
$lastscore = $_POST['score'];
$attempts = $_POST['attempts'];
$email=$_POST['email'];

$sql = "INSERT INTO scores (email, lastScore)
        VALUES (:email, :lastScore)";
        
$data = array(
        ":email" => $_SESSION['email'],
        ":lastScore" => $lastScore,
        ":attempts" => $attempts
        );
        
$stmt = $connect->prepare($sql);
$stmt->execute($data);
//Retrieving total times quiz has been submitted and average score for this user
$sql = "SELECT count(1) attempts, lastScore
        FROM practice1_quiz
        WHERE email = :email";
$stmt = $connect->prepare($sql);
$stmt->execute(array(":email"=>$_SESSION['email']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
//Encoding data using JSON
echo json_encode($result);
?>