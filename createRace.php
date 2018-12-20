<?php
session_start();
include_once 'database.php';
alert(var_dump($_POST));

$dbConn = getDatabaseConnection();
$statement = $dbConn->prepare($sql); 

$sql = 'INSERT INTO `races`(`id`, `date`, `start_time`, `location`) VALUES (['. $_POST['raceID'] .'],['.$_POST['raceDate'].'],['.$_POST['startTime'].'],['.$_POST['location'].'])';
$statement = $dbConn->prepare($sql); 
$statement->execute();



?>