<?php
session_start();

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

//LOGIN AND PAGE LOGIC
$userLoggedIn = false;

//Check for post, store data as session
if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {
$password = $_POST["password"];
$username = $_POST["username"];
$sql = "select * from users where username = \"$username\"" ; 
$result = ($conn->query($sql)); 
//declare array to store the data of database 
$userData = [];  

    if ($result->num_rows > 0)  
    { 
        // fetch all data from db into array  
        $userData = $result->fetch_row()   ;       
        $userLoggedIn = true;
        $validLogin = true;
        //echo $userData[0].$userData[1].$userData[2];
        $_SESSION["userID"] = $userData[0];
        $userID = $userData[0];
        $_SESSION["username"] = $userData[1];
        $_SESSION["password"] = $userData[2];       
    } else { $validLogin = false;}
    //echo "Made it through post check";

//check for session, get variables from session
} else if (isset($_SESSION["username"])) {
    $userID = $_SESSION["userID"];
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];           
    $userLoggedIn = true;
    $validLogin = true;
    //echo "Made it through SESSION check";

    //failed to login.
} else {
    $userLoggedIn = false;    
    $validLogin = false;
    //echo "Made it to else check";
}


// -----------------SESSION ----------------------

if (!is_null($userID)){
$sqlSessSelect = "select * from session where UserID = \"$userID\"" ; 
$result = ($conn->query($sqlSessSelect)); 
//declare array to store the data of database 
$sessionData = [];  

//check if there is an existing session
    if ($result->num_rows > 0)  
    { 
        // fetch all data from db into array  
        $sessionData = $result->fetch_row();  
        $cartID = $sessionData[0];          
        $_SESSION['cartID'] = $cartID;
        echo 'Existing ID: '.$cartID  ;
    } 
    //otherwise create a session
    else {
        $sqlSessInsert = "insert into session (UserID) VALUES('$userID')" ; 
        $sqlSessInsert = "insert into session (UserID) VALUES('$userID')" ; 
        $result = ($conn->query($sqlSessInsert));
        $result = ($conn->query($sqlSessSelect)); 
        $sessionData = []; 
        $sessionData = $result->fetch_row(); 
        $cartID = $sessionData[0];
        $_SESSION['cartID'] = $cartID;
        echo 'Created this ID: '.$cartID;
    }
} 



?>