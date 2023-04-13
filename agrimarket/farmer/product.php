<?php include("includes/header.php") ?>

    <div class="products">

        <div class="header">my products</div>

        <div class="product-list">

        <?php
                    include("./includes/config.php");
                    if (isset($_SESSION['user_id'])) {
                         $user_id = $_SESSION['user_id'];
                         getSellerProducts();
                    } else {
                         echo "<br><br><h1 align = center>Please Login!</h1><br><br><hr>";
                    }
            ?>

    </div>

    </div>

    
    <script src="/assets/js/script.js"></script>
</body>
</html>