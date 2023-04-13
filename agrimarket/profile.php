<?php include("includes/header.php") ?>

<?php
    require "./includes/config.php";
    global $conn;

    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM buyers WHERE id = '" . $id. "'";
    $run_query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_query)) {
        $name = $row['fullname'];
        $email = $row['email'];
        $number = $row['number'];
    }

?>


    <div class="profile">

            <div class="header">my profile</div>

            <div class="seperate">

                <div class="user-image">

                </div>

                <div class="information">

                    <div class="part">
                        <div class="title">full name</div>
                        <div class="info"><?php echo $name; ?></div>
                    </div>

                    <div class="part mini">
                        <div class="title">email address</div>
                        <div class="info"><?php echo $email; ?></div>
                    </div>

                    <div class="part mini">
                        <div class="title">phone number</div>
                        <div class="info"><?php echo $number; ?></div>
                    </div>

                    <button class="pop" onclick="openUpdate()">update profile</button>

                </div>

            </div>

    </div>

    <div class="backdrop" id="backdrop"></div>

    <div class="updating" id="updating">

        <div class="header">update profile</div>

        <form action="profile.php" method="post" class="principle">

            <div class="part">
                <div class="title">full name</div>
                <input type="text" name="fullname" id="fullname" placeholder="<?php echo $name; ?>">
            </div>

            <div class="part mini">
                <div class="title">email address</div>
                <input type="email" name="email" id="email" placeholder="<?php echo $email; ?>">
            </div>

            <div class="part mini">
                <div class="title">phone number</div>
                <input type="text" name="number" id="number" placeholder="<?php echo $number; ?>">
            </div>


            <button type="submit" name="submit" id="submit" class="pop">update profile</button>
     
        </form>
        <button class="closing" onclick="closeUpdate()">cancel</button>

    </div>
    
    <script src="/assets/js/script.js"></script>

    <script>
        function openUpdate() {
            document.getElementById('backdrop').style.height = "100vh";
            document.getElementById('updating').style.left = "50%"
        }
        
        function closeUpdate() {
            document.getElementById('backdrop').style.height = "0vh";
            document.getElementById('updating').style.left = "-150%"
        }
    </script>
</body>
</html>

<?php
    
        if (isset($_POST['submit'])) {
            $id = $_SESSION['user_id']; 
            $fullname = mysqli_real_escape_string( $conn, $_POST['fullname']);
            $email = mysqli_real_escape_string( $conn, $_POST['email']);
            $number = mysqli_real_escape_string( $conn, $_POST['number']);

            $query = "UPDATE buyers 
                    SET fullname = '$fullname', email = '$email',
                    number = '$number' 
                    where id = '$id'"; 
            $run = mysqli_query($conn, $query);
            $_SESSION['user_name'] = $fullname;
            echo "<script>window.open('profile.php','_self')</script>";
        }
?>
    