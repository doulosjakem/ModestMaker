<div id="signIn" style="opacity: .95;" class="MMpurple p-5 w-100 h-100 position-absolute top-50 start-50 translate-middle ">
        <div 
        class="rounded text-center MMdblue px-2 py-5 MMwhitetxt position-relative top-50 start-50 translate-middle h-100">
            <h2 class="py-5">You'll need to first login or sign up to be able to access the store
            </h2>   
            <div class="container-fluid rounded MMbrown py-5 px-2">
                <div class="rounded px-2 py-3 MMtan">
                    <form id="loginForm" action="./index.php" method="post"  class="pb-2">
                        <h2 class="text-center MMdbrowntxt">Login</h2>
                        <?php                         
                        if (!$validLogin) { ?>
                        <h4 class="text-danger text-center">Invalid Username or Password</h4>
                        <?php } ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="username">Username</span>
                            <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="password">Password</span>
                            <input type="text" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="mx-auto btn btn-dark">Login</button>
                        </div>                
                    </form>
                    <hr>
                    <h2 class="text-center MMdbrowntxt ">OR</h2>
                    <hr>

                    <form id="signUpForm" action="./SignUp.php" method="post">
                        <h2 class="text-center MMdbrowntxt">Sign Up</h2>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="username">Username</span>
                            <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="password">Password</span>
                            <input type="text" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="email">Email</span>
                            <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email">
                        </div>
                        <div class="input-group ">
                            <span class="input-group-text">First and last name</span>
                            <input type="text" aria-label="First name" name="firstname" class="form-control" placeholder="First">
                            <input type="text" aria-label="Last name" name="lastname" class="form-control" placeholder="Last">
                        </div>
                        <div class="text-center py-4">
                            <button type="submit" class="mx-auto btn btn-dark">Sign Up</button>
                        </div>
                    </form>

                    <hr>
                    <h2 class="text-center MMdbrowntxt ">OR</h2>
                    <hr>
                    <div class="text-center py-4">
                            <button type="submit" id="browseButton" class="mx-auto btn btn-dark">Browse Anyways</button>
                        </div>

                </div>
            </div>        
        </div>
    </div>