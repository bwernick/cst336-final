<?php
session_start();
include_once 'database.php';
$race_id = $_POST['id'];

$dbConn = getDatabaseConnection();
$statement = $dbConn->prepare($sql); 

$sql = 'UPDATE `races` SET `status`= "CANCELED" WHERE `id` = "'.$_POST['id'].'"';
$statement = $dbConn->prepare($sql); 
$statement->execute();

?>