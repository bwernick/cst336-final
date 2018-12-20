<?php

//CUSTOMIZE THE IF STATEMENT TO USE YOUR DATABASE FOR TESTING
//DO NOT PUSH CUSTOMIZED IF STATEMENT WITHOUT OK-ING IT WITH TEAM

// connect to our mysql database server
function getDatabaseConnection() {
    if (strpos($_SERVER['SERVER_NAME'], "c9users") !== false) {
        // running on cloud9
        $host = "tj5iv8piornf713y.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $username = "f89d4v70t1c7x38p";
        $password = "f3qapnhmsbtvmehi";
        $dbname = "q04pglwa9t4hfqjm"; 
    } else {
        //heroku or something else
        $host = "tj5iv8piornf713y.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $username = "f89d4v70t1c7x38p";
        $password = "f3qapnhmsbtvmehi"; 
        $dbname = "q04pglwa9t4hfqjm"; 
    }
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn; 
}
// temporary test code
//$dbConn = getDatabaseConnection(); 
?>