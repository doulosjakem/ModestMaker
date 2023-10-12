<?php 
session_start();
if (array_key_exists('ProductID', $_POST))
{
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

    $itemExisted = false;
    $ProductID = $_POST['ProductID'];
    $quantity = 0;
    $searchSQL = "select * from cart_item where SessionID = $cartID";
    $result = ($conn->query($searchSQL));
    $cartArray = [];
    
    if ($result->num_rows > 0){ //Are there items in the cart?
        $cartArray = $result->fetch_all(MYSQLI_ASSOC); //get them
        foreach ($cartArray as $item){ //cycle through all of them
            if ($item['ProductID'] == $ProductID) { // do any match the productID?
                $quantity = $item['Quantity'] + 1; // Set quantity to their quantity +1
                $itemExisted = true;
            }
        }        
        if ($quantity < 1) //If quantity is still less than 1, we'll be adding a new item to a cart with items already
        {
        $quantity = 1;
        $itemExisted = false;
        }

    }
    else { // There were no items in the cart, this is the first.
        $quantity = 1;
        $itemExisted = false;
    }

    
    if ($itemExisted) { // If it existed, we are updating the quantity. If not, we are inserting.
        $updateSQL = "update cart_item set Quantity='$quantity' where ProductID='$ProductID'";
        $result = ($conn->query($updateSQL));
        //echo 'Updated quantity to: ' . $quantity . '--------';
    } else {
        $insertSQL = "insert into cart_item (SessionID, ProductID, Quantity) VALUES ('$cartID','$ProductID','$quantity')";    
        $result = ($conn->query($insertSQL)); 
        //echo 'Inserted: ';
    }
    echo $cartID . $ProductID . $quantity;
} else {
    //echo 'Post Failed...';
}

header("Location: ./index.php");
?>
<a href="./index.php">Back Home</a>