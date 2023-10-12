<?php 


   $servername = "localhost"; 
   $serverUsername = "root"; 
   $serverPassword = ""; 
   $dbname = "modestmaker"; 
     
   // connect the database with the server 
   $conn = new mysqli($servername,$serverUsername,$serverPassword,$dbname); 
     
    // if error occurs  
    if ($conn -> connect_errno) 
    { 
       echo "Failed to connect to MySQL: " . $conn -> connect_error; 
       exit(); 
    } 
  
    $sql = "select * from products"; 
    $result = ($conn->query($sql)); 
    //declare array to store the data of database 
    $products = [];  
  
    if ($result->num_rows > 0)  
    { 
        // fetch all data from db into array  
        $products = $result->fetch_all(MYSQLI_ASSOC)   ;
    }    
?> 

<div class="container-fluid px-2 MMbrown">
    <div class="row py-5 g-2">
        <?php 
               if(!empty($products)) 
               foreach($products as $product) 
              {  
            ?> 
            <div class="card col-lg-3 col-md-4 col-sm-6 col-12 p-3
            <?php if ($product['ProductID'] % 2 == 0){
                echo 'MMdbrowntxt MMtan';
            } else {
                echo 'MMtantxt MMdbrown';
            }            
            ?>" >
                
                <img src="./images/<?php echo $product['Name']; ?>.jpg" class="card-img-top rounded" alt="<?php echo $product['Description']; ?>">
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $product['Name'];?></h5>
                    <p class="card-text"><?php echo $product['Description']; ?></p>
                </div>
                <ul class="list-group list-group-flush MMwhite rounded">
                    <li class="list-group-item text-center MMwhite">$<?php echo $product['Price']; ?>.00</li>
                </ul>
                <div class="card-body text-center MMblue rounded">
                    <form action="./addToCart.php" method="POST">
                        <input type="text" name="ProductID" hidden><?php echo $product['ProductID']?></input>
                    <button type="submit" class="card-link btn btn-dark">Add to Cart</button>
                    </form>
                </div>
            </div>
  
        <?php } ?> 
    </div>
</div>
  
    
<?php    
    mysqli_close($conn); 
?>