<?php 
    session_start();

    include './headers/loginHeader.php';
    require './classes/user.loginValidator.php';
    require_once './classes/user.dbQuery.php';
    
    if(isset($_POST['loginUser']))
    {
        $loginValidator = new UserLoginValidator();
        $loginValidator->setEmail($_POST['email']);
        $loginValidator->setPassword($_POST['password']);
        $errors = $loginValidator->validateUserLogin();

        if (empty($errors)) 
        {
            print_r(
                '<div class="loginAlert position-absolute mt-5 top-0 start-50 translate-middle alert d-flex align-items-center" role="alert">
                    <div>
                        <i class="bi bi-hand-thumbs-up-fill"></i>
                        Login successful!
                    </div>
                </div>'
            );
            header('Refresh:3; url=./home.php');
        } 
        else 
        {
            print_r(
                '<div class="myAlert position-absolute mt-5 top-0 start-50 translate-middle alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                        <i class="bi bi-emoji-frown-fill"></i>
                        Login Failed!
                    </div>
                </div>'
            );
            // header('Refresh:3; url=./login.php');
        }
    }

?>

<body>
    <section class="d-flex">
        <aside id="leftAside">
            <div class="d-flex align-items-center">
                <h2>Login to </h2><img class="img-fluid ms-1" src="assets/svg/bloggerLogoWhite.svg" alt="blogger logo">
            </div>
        </aside>

        <aside id="rightAside">
            <div class="header d-flex justify-content-end align-items-center">
                <a href="index.php">Don't have an account?</a>
                <a href="index.php" class="btn rounded-1" href="#">Signup</a>
            </div>
            <div class="formWrapper d-flex flex-column">
                <div class="formContents d-flex flex-column">
                    <h2 class="py-4">Login to your account</h2>
                    <form action="" method="post"> <!-- signup form -->
                        <div>
                            <label for="email">Email address <b class="text-danger">* </b><span class="text-danger"><?=$errors['email'] ?? '' ?></span></label>
                            <input type="text" name="email" value="" placeholder="Your email address">
                        </div>
                        <div>
                            <label for="password">Password <b class="text-danger">* </b><span class="text-danger"><?=$errors['password'] ?? '' ?></span></label>
                            <input type="password" name="password" value="" placeholder="Your password">
                        </div>
                        <div class="createAcctBtn mt-4">
                            <input type="submit" name="loginUser" class="btn rounded-1" value="Login to account">
                            <a href="#" class="mt-2 ms-2">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </aside>

    </section>
</body>