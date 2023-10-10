<?php 
   $servername = "localhost"; 
   $username = "root"; 
   $password = ""; 
   $dbname = "modestmaker"; 
     
   // connect the database with the server 
   $conn = new mysqli($servername,$username,$password,$dbname); 
     
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
                        <button onclick="" class="card-link btn btn-dark" disabled>Add to Cart</button>
                    </div>
                </div>
    
            <?php } ?> 
        </div>
    </div>
    
    <div class="MMpurple opacity-75 p-5 w-100 h-100 position-absolute top-50 start-50 translate-middle ">
        <div class="rounded text-center MMdblue py-5 MMwhitetxt position-relative top-50 start-50 translate-middle h-100">
            <h2 class="py-5">You'll need to first <a href="./signin.php" class="btn btn-light">Sign In</a> to be able to access the store
            </h2>
           
        </div>
    </div>
</div>

  
    
<?php    
    mysqli_close($conn); 
?>