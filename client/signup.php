<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style-register.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                        <?php } ?>
                        <form method="POST" action="/worldnews/webservices/api/sign-up-check.php" class="register-form" id="register-form">
                            <!-- <div class="form-group">
                                <input type="hidden" name="news_id" id="news_id" value="<?php echo (isset($_GET['id']) ? $_GET['id'] : '') ?>" />
                            </div> -->
                            <div class="form-group">
                                <label for="uname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <?php if (isset($_GET['uname'])) { ?>
                                    <input type="text" name="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>"><br>
                                <?php } else { ?>
                                    <input type="text" name="uname" placeholder="User Name" required><br>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <div class="message">
                                    <?php if (isset($_GET['uname'])) { ?>
                                        <input type="email" name="email" placeholder="Your email" value="<?php echo $_GET['email']; ?>"><br>
                                    <?php } else { ?>
                                        <input type="email" name="email" placeholder="Your email" required><br>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re_pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <script src="vendor/jquery/jquery.min.js">
        </script>
        <script src="js/main-register.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>