<?php
        session_start();
        require_once "./includes/config.php";
    

        if(isset($_POST['signUpbtn']) ){
            if( isset($_POST['category'])){				
                $value = $_POST['category'];
                if($value == 'buyer' ){
                    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    $cpassword = mysqli_real_escape_string($conn, $_POST['con_password']);
                    $number = mysqli_real_escape_string($conn, $_POST['number']);
                    
                    //checking username & email if already present
                    $check_username= mysqli_query($conn, "SELECT fullname FROM buyers where fullname = '".$fullname."' ");
                    $check_email = mysqli_query($conn, "SELECT email FROM buyers where email = '".$email."' ");

                            
                    if (!preg_match("/^[a-zA-Z ]+$/",$fullname)) {
                        $name_error = "Name must contain only alphabets and space";
                    }
                    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                        $email_error = "Please input Valid Email ID ";
                    }
                    elseif(strlen($password) < 6) {
                        $password_error = "Password must be minimum of 6 characters";
                    }       
                    elseif($password != $cpassword) {
                        $cpassword_error = "Password and Confirm Password doesn't match";
                    }
                    elseif(mysqli_num_rows($check_username) > 0)  //check username
                    {
                        $message = 'Username Already exists! ';
                    }
                    elseif(mysqli_num_rows($check_email) > 0) //check email
                    {
                        $message = 'Email Already exists!';
                    }

                    else{
                       $query = mysqli_query($conn, "INSERT INTO buyers(fullname, email, number, password) VALUES('" . $fullname . "', '" . $email . "','" . $number . "', '" . md5($password) . "')");
                        header("location: login.php");

                        exit();
                        
                    }   
                    mysqli_close($conn);

                        }

            if($value == 'seller' ){
                $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $cpassword = mysqli_real_escape_string($conn, $_POST['con_password']);
                $number = mysqli_real_escape_string($conn, $_POST['number']);
                
                //checking username & email if already present
                $check_username= mysqli_query($conn, "SELECT fullname FROM sellers where fullname = '".$fullname."' ");
                $check_email = mysqli_query($conn, "SELECT email FROM sellers where email = '".$email."' ");

                
        if (!preg_match("/^[a-zA-Z ]+$/",$fullname)) {
            $name_error = "Name must contain only alphabets and space";
        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please input Valid Email ID ";
        }
        elseif(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }       
        elseif($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
        }   
        elseif(mysqli_num_rows($check_username) > 0)  //check username
        {
            $message = 'Username Already exists! ';
        }
        elseif(mysqli_num_rows($check_email) > 0) //check email
        {
            $message = 'Email Already exists!';
        }

        else{
            $query =  mysqli_query($conn, "INSERT INTO sellers(fullname, email, password, number) VALUES('" . $fullname . "', '" . $email . "', '" . md5($password) . "','" . $number . "')");
            header("location: login.php");
            
            exit();
        }   
            mysqli_close($con);
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

            <div class="heading">Register</div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="optional">
                    <div class="sort"><input type="radio" name="category" <?php if(isset($category) && $category=="buyer") echo "checked";?>  value="buyer" id="category" required>As a buyer</div>
                    <div class="sort"><input type="radio" name="category" <?php if(isset($category) && $category=="seller") echo "checked";?> value = "seller" id="category" required>As a seller</div>
                </div>


                <div class="part">
                <span class="text-danger" style="color:red"> <?php if(isset($message)) echo $message; ?></span>
                <span class="text-danger" style="color:red"><?php if (isset($name_error)) echo $name_error; ?></span>
                <span class="text-danger" style="color:red"><?php if (isset($email_error)) echo $email_error; ?></span>
                <span class="text-danger" style="color:red"><?php if (isset($password_error)) echo $password_error; ?></span>
                <span class="text-danger" style="color:red"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    <label for="name">Your full name</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Full name" required>
                </div>

                <div class="part">
                    <label for="email">Your email address</label>
                    <input type="email" name="email" id="email" placeholder="Email address" required>
                </div>
                
                <div class="part">
                    <label for="number">Your phone number</label>
                    <input type="text" name="number" id="number" placeholder="Phone number" required>
                </div>

                <div class="together">
                    <div class="part">
                        <label for="password">Your password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
    
                    <div class="part">
                        <label for="con_password">Confirm password</label>
                        <input type="password" name="con_password" id="con_password" placeholder="Confirm password" required>
                    </div>
                </div>

                <div class="part">
                    <button type="submit" name="signUpbtn" id="signUpbtn">Register</button>
                </div>

                <div class="end">Already registered? <a href="login.php">click here</a></div>

            </form>

        </div>

    </div>

</body>
</html>