<?php 
session_start();

// Both quantity and productID will be passed in, 
// I'll need to get the session/cart id
// if quantity = 0, drop item from cart
// else update quantity

if (array_key_exists('ProductID', $_POST) && array_key_exists('Quantity', $_POST)) {
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
    $ProductID = $_POST['ProductID'];
    $quantity = $_POST['Quantity'];
    if ($quantity > 0){
    $updateSQL = "update cart_item set Quantity='$quantity' where ProductID='$ProductID'";
    $result = ($conn->query($updateSQL));
    echo 'changed quantity to '. $quantity;
    }
    else {
    $deleteSQL = "delete from cart_item where SessionID = '$cartID' AND ProductID = '$ProductID'";
    $result = ($conn->query($deleteSQL));
    echo 'Deleted';
    }
}

header("Location: ./cart.php");
?>
<a href="./cart.php">Back to Cart</a>