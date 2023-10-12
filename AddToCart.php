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

    $ProductID = $_POST['ProductID'];
    $quantity = 0;
    $searchSQL = "select * from cart_item where SessionID = $cartID";
    $result = ($conn->query($searchSQL));
    $cartArray = [];
    if ($result->num_rows > 0){
        $cartArray = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($cartArray as $item){
            if ($item['ProductID'] == $ProductID) {
                $quantity++;
            }
        }        
        if ($quantity<1){$quantity++;}

    }
    else {
        $quantity++;
    }
    $insertSQL = "insert into cart_item (SessionID, ProductID, Quantity) VALUES ('$cartID','$ProductID','$quantity')";    
    $result = ($conn->query($insertSQL)); 
    echo $cartID . $ProdcutID . $quantity;
} else {
    echo 'didnt go in...';
}

//header("Location: ./index.php");
?>
<a href="./index.php">Back Home</a>