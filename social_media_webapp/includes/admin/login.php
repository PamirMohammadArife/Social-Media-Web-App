<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Sign in - Social Media App</title>
    <link rel="stylesheet" href="../../assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../../assets/css/l-style.css">
</head>
<body>

            <?php
                require '../../config/config.php';    
            ?>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../../assets/images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="log_email" id="your_email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="log_password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login_button" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <?php 
                            if(isset($_POST['login_button']))
                            {
                                $log_email = $_POST['log_email'];
                                $log_pass = $_POST['log_password'];
                                $query = mysqli_query($con, "select * from admin where admin_email='$log_email' AND admin_password='$log_pass'");
                                $check_query = mysqli_num_rows($query);
                                if($check_query == 1)
                                {
                                    $_SESSION['log_email'] = $log_email;
                                    header("Location: index.php");
                                    exit();
                                }
                                else {
                                    echo "<script>alert('Email & Password Wrong');</script>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>