<?php 
    include_once 'partials/headers.php';
    include_once 'backend/init.php';

    if($userObj->isLoggedIn()){
        header("Location: frontend/dashboard.php");
    }

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['login'])){
            $email = Validate::escape($_POST['email']);
            $password = $_POST['password'];

            if(!empty($email) && !empty($password
            )){
                if(!Validate::filterEmail($email)){
                    $error = "Invalid email format";
                }else{
                    if($user = $userObj->emailExist($email)){
                        $hash = $user->password;
                        if(password_verify($password, $hash)){
                            $_SESSION['user_id'] = $user->userID;
                            header("Location: frontend/dashboard.php");
                        }else{
                            $error = "Your email or password is incorrect!";
                        }
                    }
                }

            }else{
                $error = "Please enter your email and password!";
            }
        }
    }
?>
        <!--WRAPPER-->
    <div class="wrapper">	
    <div class="inner-wrapper flex fl-c">

        <div class="sign-in-wrapper flex fl-1">
            <div class="sign-in-box flex fl-c">
                <div class="sign-up-head">
                    <span><i class="fab fa-blogger-b"></i></span>
                </div>
                <form method="post">
                    <div class="sign-body">
                        <div>
                            <div class="in-div">
                                <input class="in-fo" type="email" name="email" placeholder="Enter your email or mobile number" autocomplete="off">
                                <span class="in-span">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="in-div">
                                <input class="in-fo" type="password" name="password" placeholder="Password" autocomplete="off">
                                <span class="in-span">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <div><?php if(isset($error)){ echo $error; }; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="sign-footer">
                        <button type="submit" name="login">login</button>
                        <a type="button" class="cancel-btn" href="signup.php">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php 
    include_once 'partials/footers.php';
?>