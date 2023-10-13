<?php 
session_start();
if (array_key_exists('cartID', $_SESSION))
{
    $grandTotal = 0;
    $tax = .06;
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

    $sqlCartSelect = "select * from cart_item where SessionID = '$cartID'"; 
    $result = ($conn->query($sqlCartSelect)); 
    //declare array to store the data of database 
    $cart = [];  
    $emptyCart = false;
  
    if ($result->num_rows > 0)  
    {  
        $cart = $result->fetch_all(MYSQLI_ASSOC);
        
    } else {
        $emptyCart = true;
    } 
    if (!$emptyCart){
    $productNames = []; 
    $productPrices = [];
    $productIDs = [];
    $increment = 0;
        foreach($cart as $item) 
        { 
            $productIDs[$increment] = $item['ProductID'];
            $tempID = $productIDs[$increment];
            $sqlProductNames = "select * from products where ProductID = '$tempID'"; 
            $result = ($conn->query($sqlProductNames)); 
            //declare array to store the data of database             
        
            if ($result->num_rows > 0)  
            {  
                
                $temp = $result->fetch_array();   
                $productNames[$increment] = $temp[1];
                $productPrices[$increment] = $temp[3];
                $increment++;       
            }    
        }
    }

}
    

?>
<?php 
?>
<!DOCTYPE html>
<html class="m-0 p-0">

<head>
    <?php include "HeadLinks.php" ?>
    <title>ModestMaker Craftstore</title>
</head>

<body class="m-0 p-0">
    <?php include "TopNav.php" ?>
    
    <div class="container-fluid px-2 MMbrown">
        <h2 class="text-center MMwhitetxt pt-5"><?php echo $_SESSION['username']?>'s Cart</h2>
        <?php if ($emptyCart) { ?>
            <h3 class="text-center MMwhitetxt pt-5">Your Cart is Empty</h3><br>
        <?php } else { ?>
        <div class="row py-5 g-2">
        <?php         
                $increment = 0;
                if(!empty($cart)) 
                foreach($cart as $item) 
                {  
                    $total = ($productPrices[$increment] * $item['Quantity']);
                    $grandTotal += $total;
                    ?>
            
                <div class="card col-lg-3 col-md-4 col-sm-6 col-12 p-3 MMdbrowntxt MMtan
            " >
                    
                    <img src="./images/<?php echo $productNames[$increment]; ?>.jpg" class="img-fluid rounded">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $productNames[$increment];?>(s)</h5>
                        <p class="card-text text-center">$<?php echo $productPrices[$increment]; ?>.00 x <?php echo $item['Quantity']; ?> = $<?php echo $total ?>.00</p>
                        <div class="card-text text-center">

                            <form action="./AlterCart.php" method="POST">
                                <input type="text" name="ProductID" value="<?php echo $item['ProductID'];?>" hidden></input>
                                <input type="text" name="Quantity" value="<?php echo ($item['Quantity'] + 1);?>" hidden></input>
                            <button type="submit" class="card-link btn btn-dark">Add Another</button>
                            </form>

                            <p class="pt-3">Quantity: <?php echo $item['Quantity']; ?></p>

                            <form action="./AlterCart.php" method="POST">
                                <input type="text" name="ProductID" value="<?php echo $item['ProductID'];?>" hidden></input>
                                <input type="text" name="Quantity" value="<?php echo ($item['Quantity'] - 1);?>" hidden></input>
                            <button type="submit" class="card-link btn btn-dark">Subtract</button>
                            </form>

                        </div> 
                    </div>
                    
                </div>
                <?php $increment++;
            } ?> 
        </div>
        <hr>
        <h2 class="text-center MMwhitetxt pt-5">Subtotal: $<?php echo $grandTotal; ?>.00</h2>
        <h2 class="text-center MMwhitetxt pt-5">Tax: $<?php echo round(($grandTotal*$tax), 2); ?></h2>
        <h2 class="text-center MMwhitetxt pt-5">Total: $<?php echo round(($grandTotal + round(($grandTotal*$tax), 2)), 2); ?></h2>
        <br>
            <div class="text-center">
            <form action="purchase.php" method="POST">
            <?php $_SESSION['cartArray'] = $cart; ?>
                <button type="submit" class="btn btn-primary">
                Buy Now
                </button>
                </form>
                <br>
                <form action="clearCart.php" method="POST">
                    
                <button type="submit" class="btn btn-dark">
                Clear Cart
                </button>
                </form>
            </div>
            <br>
            <?php } ?>
</div>
    
    <?php include "BotFooter.php" ?>
</body>
</html>

<?php    
    mysqli_close($conn); 
?>