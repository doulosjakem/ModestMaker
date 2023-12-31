

<nav class="MMblue MMtantxt navbar navbar-dark navbar-expand-md border-bottom border-black border-5">
    <div class="container-fluid d-flex">
        <a href="./index.php">
            <img class="rounded me-1" style="width: 40px;" src="./favicon/apple-touch-icon.png" alt="Modest Maker logo">
            <a class="MMtantxt ms-1 navbar-brand me-auto rounded" href="./index.php">Modest Maker</a>
        </a>
        <button class="navbar-toggler navbar-dark ms-auto " type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                    <a class="MMtantxt nav-link text-end rounded px-3 m-1"
                        href="./index.php" role="button">Home</a>
                </li> 
                <?php if ($_SESSION['userLoggedIn']) { ?>
                <li class="nav-item">
                    
                    <a class="MMtantxt nav-link text-end rounded px-3 m-1"
                        id="navLogOut" href="./logout.php" role="button">Logout <?php echo $_SESSION['username']; ?></a>
                    
                </li>                
                <li class="nav-item">
                    <a class="MMtantxt nav-link text-end rounded px-3 m-1" href="./cart.php">Cart</a>
                </li>
                <?php } else { ?>
                    <li class="nav-item">
                    <a class="MMtantxt nav-link text-end rounded px-3 m-1"
                        href="./index.php#signIn" id="navSignin" role="button">Sign In</a>
                </li>                
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>