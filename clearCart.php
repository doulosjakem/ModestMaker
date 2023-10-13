<?php
session_start();
$servername = "localhost"; 
    $serverUsername = "root"; 
    $serverPassword = ""; 
    $dbname = "modestmaker"; 
    $cartID = $_SESSION["cartID"];

    // connect the database with the server 
    $conn = new mysqli($servername,$serverUsername,$serverPassword,$dbname); 

    // if error occurs  
    if ($conn -> connect_errno) 
    { 
        echo "Failed to connect to MySQL: " . $conn -> connect_error; 
        exit(); 
    } 

    $deleteSession = "delete from session where SessionID = '$cartID'"; 
    $result = ($conn->query($deleteSession)); 
    echo 'Successfully deleted session: ' . $cartID;

    header("Location: ./index.php");
    ?>
    <a href="./index.php">Back Home</a>