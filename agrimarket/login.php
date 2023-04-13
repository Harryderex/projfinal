<?php
        session_start();    

        require_once "./includes/config.php";
        

        if (isset($_POST['submit'])) {
                if( isset($_POST['category'])){	
                    $value = $_POST['category'];
                    if($value == 'buyer' ){
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);

                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                        $email_error = "Please input Valid Email ID";
                    }
                    elseif(strlen($password) < 6) {
                        $password_error = "Password must be minimum of 6 characters";
                    } 
                    
                    session_regenerate_id(true);
                    $result = mysqli_query($conn, "SELECT * FROM buyers WHERE email = '" . $email. "' and password = '" . md5($password). "'");
                    if(!empty($result)){
                            if ($row = mysqli_fetch_array($result)) {
                                $_SESSION['user_id'] = $row['id'];
                                $_SESSION['user_name'] = $row['fullname'];
                                $_SESSION['user_email'] = $row['email'];
                                header("Location: index.php");
                            } else {
                                $error_message = "Incorrect Email or Password!!!";
                            }
                        }    
                    }
                    $value = $_POST['category'];
                    if($value == 'seller' ){
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);

                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                        $email_error = "Please input Valid Email ID";
                    }
                    elseif(strlen($password) < 6) {
                        $password_error = "Password must be minimum of 6 characters";
                    } 
                    
                    session_regenerate_id(true);
                    $result = mysqli_query($conn, "SELECT * FROM sellers WHERE email = '" . $email. "' and password = '" . md5($password). "'");
                    if(!empty($result)){
                            if ($row = mysqli_fetch_array($result)) {
                                $_SESSION['user_id'] = $row['id'];
                                $_SESSION['user_name'] = $row['fullname'];
                                $_SESSION['user_email'] = $row['email'];
                                header("Location: /agrimarket/farmer/index.php");
                            } else {
                                $error_message = "Incorrect Email or Password!!!";
                            }
                        }    
                    }

                }
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriMarket | Fresh food, Online Access</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="style.css">


    <!-- CSS PLUGINS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome.css">
    <link rel="stylesheet" href="assets/plugins/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owl.theme.default.min.css">


    <!-- SCRIPT PLUGINS -->
    <script src="assets/plugins/jquery.min.js"></script>
    <script src="assets/plugins/fontawesome.js"></script>
    <script src="assets/plugins/owl.carousel.min.js"></script>
</head>
<body style="background-color: #f8f8f8;">

    <div class="login">

        <div class="logo"><img src="favicon.png" alt=""></div>

        <div class="login-content">

            <div class="guide" onclick="history.back()"><i class="fas fa-arrow-left"></i></div>

            <div class="heading">Login</div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="optional">
                    <div class="sort"><input type="radio" <?php if(isset($category) && $category=="buyer") echo "checked";?> value="buyer" name ="category" id="category" required>As a buyer</div>
                    <div class="sort"><input type="radio" <?php if(isset($category) && $category=="seller") echo "checked";?> value = "seller" name ="category" id="category" required>As a seller</div>
                </div>

                
                <div class="part">
                    <span class="text-danger" style="color: red"> <?php if(isset($error_message)) echo $error_message; ?></span>
                <span class="text-danger" style="color: red"><?php if (isset($email_error)) echo $email_error; ?></span> 
                <span class="text-danger" style="color: red"><?php if (isset($password_error)) echo $password_error; ?></span>
                    <label for="email">Your registered email address</label>
                    <input type="email" name="email" id="email" placeholder="your email address" required>
                </div>

                <div class="part">
                    <label for="password">Your password</label>
                    <input type="password" name="password" id="email" placeholder="your password" required>
                </div>

                <div class="part">
                    <button type="submit" id="submit" name="submit">Login</button>
                </div>

                <div class="end">Not yet registered? <a href="register.php">click here</a></div>

            </form>

        </div>

    </div>

</body>
</html>