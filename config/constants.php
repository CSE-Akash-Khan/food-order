<?php
    //start session
    session_start();


    //create constants to store non repeating values
    define('SITEURL','http://localhost/food-order/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD','');
    define('DB_NAME','food-order');
    

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //data base connection.. default user name root and pass: blank
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database

?>