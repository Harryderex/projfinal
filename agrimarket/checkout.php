<?php include("includes/header.php") ?>


    <div class="checkout">
        
        <div class="insider">

            <div class="contact-information">

                <div class="header">shipping address</div>

                <form action="" method="post" class="shipping">

                    <div class="part">
                        <label for="named">Your name</label>
                        <input type="text" name="named" placeholder="your full name" required>
                    </div>
                    
                    <div class="part">
                        <label for="pnumber">Your phone number</label>
                        <input type="text" name="pnumber" placeholder="your phone number" required>
                    </div>

                    <div class="part">
                        <label for="address">Your address</label>
                        <textarea name="address" placeholder="your address" required></textarea>
                    </div>

                    <div class="payment">

                        <div class="heading">select your payment method</div>

                        <div class="optional">
                            <div class="sort"><input type="radio" value="buyer" name ="category" id="category" required>cash on delivery</div>
                            <div class="sort"><input type="radio" value="seller" name ="category" id="category" required>paypal</div>
                        </div>

                    </div>

                    
                    <div class="part">
                        <button type="submit" id="submit" name="submit">checkout</button>
                    </div>

                </form>

            </div>

        </div>

        <div class="summary">
            <div class="heading">cart summary</div>

            <div class="fact">
                <div class="title">Rice </div>
                <div class="pointer"><span> 30,600 </span></div>
            </div>

            <div class="fact">
                <div class="title">Rice </div>
                <div class="pointer"><span> 30,600 </span></div>
            </div>
            
            <div class="calc">
                <div class="title">Subtotal</div>
                <div class="actu total"><span> 61,200</span></div>
            </div>

            <div class="delivery">
                <div class="title">delivery fee </div>
                <div class="pointer"><span> 2,500 </span></div>
            </div>
            
            <div class="grand">
                <div class="title">Grand total</div>
                <div class="actu total"><span> 63,700</span></div>
            </div>

        </div>

    </div>
    
    <script src="/assets/js/script.js"></script>
</body>
</html>