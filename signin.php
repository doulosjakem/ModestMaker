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
  
    // $sql = "select * from users"; 
    // $result = ($conn->query($sql)); 
    // //declare array to store the data of database 
    // $row = [];  
  
    // if ($result->num_rows > 0)  
    // { 
    //     // fetch all data from db into array  
    //     $row = $result->fetch_all(MYSQLI_ASSOC)   ;
    // }    
?> 

<!DOCTYPE html>

<head>
    <?php include "HeadLinks.php" ?>
    <title>ModestMaker Sign In/Up page</title>
</head>

<body>
    <?php include "TopNav.php" ?>
    
    <div class="container-fluid MMbrown p-5">
        <div class="rounded container py-3 MMtan">
            <form action="" class="pb-2">
                <h2 class="text-center MMdbrowntxt">Login</h2>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="username">Username</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="username">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="password">Password</span>
                    <input type="text" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password">
                </div>
                <div class="text-center">
                    <button type="submit" class="mx-auto btn btn-dark">Login</button>
                </div>                
            </form>
            <hr>
            <form>
                <h2 class="text-center MMdbrowntxt">Sign Up</h2>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="username">Username</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="username">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="password">Password</span>
                    <input type="text" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="email">Email</span>
                    <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email">
                </div>
                <div class="input-group ">
                    <span class="input-group-text">First and last name</span>
                    <input type="text" aria-label="First name" class="form-control" placeholder="First">
                    <input type="text" aria-label="Last name" class="form-control" placeholder="Last">
                </div>
                <div class="text-center py-4">
                    <button type="submit" class="mx-auto btn btn-dark">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    
    <?php include "BotFooter.php" ?>
</body>
  
<?php    
    mysqli_close($conn); 
?>