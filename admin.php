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
  
    $sql = "select * from users"; 
    $result = ($conn->query($sql)); 
    //declare array to store the data of database 
    $row = [];  
  
    if ($result->num_rows > 0)  
    { 
        // fetch all data from db into array  
        $row = $result->fetch_all(MYSQLI_ASSOC)   ;
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
<head>
    <?php include "HeadLinks.php" ?>
    <title>ModestMaker Admin page</title>
</head>

<body>
    <?php include "TopNav.php" ?>
    
    <table> 
        <thead> 
            <tr> 
                <th>UserID</th> 
                <th>Username</th> 
                <th>Password</th>
                <th>Email</th>
                <th>Firstname</th> 
                <th>Lastname</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php 
               if(!empty($row)) 
               foreach($row as $rows) 
              {  
            ?> 
            <tr>   
                <td><?php echo $rows['UserID']; ?></td> 
                <td><?php echo $rows['Username']; ?></td> 
                <td><?php echo $rows['Password']; ?></td>                 
                <td><?php echo $rows['Email']; ?></td>                                
                <td><?php echo $rows['Firstname']; ?></td>                                          
                <td><?php echo $rows['Lastname']; ?></td>   
            </tr> 
            <?php } ?> 
        </tbody> 
    </table>     
    <?php include "BotFooter.php" ?>
</body>
  
<?php    
    mysqli_close($conn); 
?>