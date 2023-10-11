<?php 
   $servername = "localhost"; 
   $serverUsername = "root"; 
   $password = ""; 
   $dbname = "modestmaker"; 
     
   // connect the database with the server 
   $conn = new mysqli($servername,$serverUsername,$password,$dbname); 
     
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

<!DOCTYPE html> 
<style> 
    td,th { 
        border: 1px solid black; 
        padding: 10px; 
        margin: 5px; 
        text-align: center; 
    } 
</style> 
  
    <table> 
        <thead> 
            <tr> 
                <th>ID</th> 
                <th>Name</th> 
                <th>Desc</th> 
                <th>Price</th>
                <th>CategoryID</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php 
               if(!empty($products)) 
               foreach($products as $product) 
              {  
            ?> 
            <tr> 
  
                <td><?php echo $product['ProductID']; ?></td> 
                <td><?php echo $product['Name']; ?></td> 
                <td><?php echo $product['Description']; ?></td>                 
                <td><?php echo $product['Price']; ?></td>                                
                <td><?php echo $product['CategoryID']; ?></td> 
  
            </tr> 
            <?php } ?> 
        </tbody> 
    </table> 

<?php    
    mysqli_close($conn); 
?>