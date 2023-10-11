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

<div class="position-relative">
    
    <div class="container-fluid px-2 MMbrown">
        <h2 class="text-center MMtantxt py-3">You're only browsing, <button id="loginBtn" class="btn btn-light">Login</button> for full access.</h2>
        <div class="row pb-5 g-2">
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
                        <button onclick="" class="card-link btn btn-dark" disabled>Add to Cart</button>
                    </div>
                </div>
    
            <?php } ?> 
        </div>
    </div>
    
    <?php include("signin.php"); ?>
</div>

  
    
<?php    
    mysqli_close($conn); 
?>