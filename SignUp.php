<?php
session_start();
if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST) && array_key_exists('email', $_POST) && array_key_exists('firstname', $_POST) && array_key_exists('lastname', $_POST))
{
    $servername = "localhost"; 
    $serverUsername = "root"; 
    $serverPassword = ""; 
    $dbname = "modestmaker"; 
    $userID = null;
    
    // connect the database with the server 
    $conn = new mysqli($servername,$serverUsername,$serverPassword,$dbname); 
    
    // if error occurs  
    if ($conn -> connect_errno) 
    { 
        echo "Failed to connect to MySQL: " . $conn -> connect_error; 
        exit(); 
    } 

    $userLoggedIn = true;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "insert into users 
    (Username, Password, Email, Firstname, Lastname) VALUES
    ('$username', '$password', '$email', '$firstname', '$lastname')" ; 
    $result = ($conn->query($sql)); 
    $sql = "select * from users where username = \"$username\"" ; 
    $result = ($conn->query($sql)); 
    //declare array to store the data of database 
    $userData = [];  
        if ($result->num_rows > 0)  
        { 
            echo "I'm inside";
            // fetch all data from db into array  
            $userData = $result->fetch_row()   ; 
            $_SESSION["userID"] = $userData[0];
            $userID = $userData[0];
            $_SESSION["username"] = $userData[1];
            $_SESSION["password"] = $userData[2]; 
            //echo "-----1: ". $userData[0] ." 2:". $userData[1]. $userData[2]. $userData[3]. $userData[4]. $userData[5];
        }
} 
else {
    $userLoggedIn = false;
}

header("Location: ./index.php");
?>
<a href="./index.php">Back Home</a>