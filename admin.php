<?php 
   $servername = "localhost"; 
   $serverUsername = "root"; 
   $serverPassword = ""; 
   $dbname = "modestmaker"; 
   $userLoggedIn = false;
     
   // connect the database with the server 
   $conn = new mysqli($servername,$serverUsername,$serverPassword,$dbname); 
     
    // if error occurs  
    if ($conn -> connect_errno) 
    { 
       echo "Failed to connect to MySQL: " . $conn -> connect_error; 
       exit(); 
    } 
  
    $sqlUsers = "select * from users"; 
    $result = ($conn->query($sqlUsers)); 
    //declare array to store the data of database 
    $users = [];  
  
    if ($result->num_rows > 0)  
    { 
        // fetch all data from db into array  
        $users = $result->fetch_all(MYSQLI_ASSOC)   ;
    }    
    $sqlSession = "select * from session"; 
    $result = ($conn->query($sqlSession)); 
    //declare array to store the data of database 
    $sessions = [];  
  
    if ($result->num_rows > 0)  
    { 
        // fetch all data from db into array  
        $sessions = $result->fetch_all(MYSQLI_ASSOC)   ;
    }    
?> 

<!DOCTYPE html>

<style> 
    
</style> 
<head>
    <?php include "HeadLinks.php" ?>
    <title>ModestMaker Admin page</title>
</head>

<body>
    <?php include "TopNav.php" ?>
    
    <table class="table table-bordered table-striped table-dark"> 
        <h2 class="text-center">Users</h2>
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
               if(!empty($users)) 
               foreach($users as $user) 
              {  
            ?> 
            <tr>   
                <td><?php echo $user['UserID']; ?></td> 
                <td><?php echo $user['Username']; ?></td> 
                <td><?php echo $user['Password']; ?></td>                 
                <td><?php echo $user['Email']; ?></td>                                
                <td><?php echo $user['Firstname']; ?></td>                                          
                <td><?php echo $user['Lastname']; ?></td>   
            </tr> 
            <?php } ?> 
        </tbody> 
    </table>     
    <table class="table table-bordered table-striped table-dark"> 
    <h2 class="text-center">Sessions</h2>
        <thead> 
            <tr> 
                <th>SessionId</th> 
                <th>UserID</th> 
                <th>Total</th>
                <th>Created</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php 
               if(!empty($sessions)) 
               foreach($sessions as $session) 
              {  
            ?> 
            <tr>   
                <td><?php echo $session['SessionID']; ?></td> 
                <td><?php echo $session['UserID']; ?></td> 
                <td><?php echo $session['Total']; ?></td>                 
                <td><?php echo $session['created']; ?></td>    
            </tr> 
            <?php } ?> 
        </tbody> 
    </table>     
    <?php include "BotFooter.php" ?>
</body>
  
<?php    
    mysqli_close($conn); 
?>