<?php 
$username = 

?>
<!DOCTYPE html>
<html class="m-0 p-0">

<head>
    <?php include "HeadLinks.php" ?>
    <title>ModestMaker Craftstore</title>
</head>

<body class="m-0 p-0">
    <?php include "TopNav.php" ?>
    
    <?php if (true)
    { 
    include "LoginReminder.php";
    } else {
    include "Store.php";
    }
     ?>
    
    <?php include "BotFooter.php" ?>
</body>
</html>
