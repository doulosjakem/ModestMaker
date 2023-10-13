<?php
session_start();
$servername = "localhost"; 
    $serverUsername = "root"; 
    $serverPassword = ""; 
    $dbname = "modestmaker"; 
    $cartID = $_SESSION["cartID"];
    $cart = $_SESSION["cartArray"];
    $userID = $_SESSION["userID"];

    // connect the database with the server 
    $conn = new mysqli($servername,$serverUsername,$serverPassword,$dbname); 

    // if error occurs  
    if ($conn -> connect_errno) 
    { 
        echo "Failed to connect to MySQL: " . $conn -> connect_error; 
        exit(); 
    } 
    
    $createOrder = "insert into orders (UserID, SessionID) VALUES ('$userID', '$cartID')"; 
    $result = ($conn->query($createOrder)); 
    echo 'Successfully created order for user: ' . $userID . 'At SessionID of: '. $cartID;

    $selectOrder = "select OrderID from orders where UserID = '$userID' AND SessionID = '$cartID'";
    $result = ($conn->query($selectOrder));
    $temp = $result->fetch_array();
    //$count = array_count_values($temp);
    //echo 'ARRAY COUNT: ' . array_count_values($temp);
    $orderID = $temp[0];
    echo '---Succesfully retrieved orderID of: ' . $orderID;

    foreach ($cart as $item){
        $productID = $item['ProductID'];
        $quantity = $item['Quantity'];

        $insertSQL = "insert into order_item (OrderID, ProductID, Quantity) VALUES ('$orderID','$productID','$quantity')";    
        $result = ($conn->query($insertSQL)); 
        echo $orderID. ' '. $productID. ' '. $quantity;
    }


    // $createOrder = "insert into orders (UserID) values ('$userID')"; 
    // $result = ($conn->query($createOrder)); 

    header("Location: ./clearCart.php");
    ?>
    <a href="./clearCart.php">Back Home</a>