<?php include("includes/header.php") ?>


    <div class="transactions">

        <div class="header">transactions</div>

        <div class="table">

            <div class="heading">pending orders</div>

            <table id="myTable">
                    
                <tr>
                    <th onclick="sortTable(0)" class="t-product">product <span class="iconic"><i class="fas fa-sort"></i></span></th>
                    <th onclick="sortTable(1)" class="t-quant">quantity <span class="iconic"><i class="fas fa-sort"></i></span></th>
                    <th onclick="sortTable(2)" class="t-price">price <span class="iconic"><i class="fas fa-sort"></i></span></th>
                    <th onclick="sortTable(3)" class="t-seller">farmer <span class="iconic"><i class="fas fa-sort"></i></span></th>
                    <th onclick="sortTable(4)" class="t-date">Date <span class="iconic"><i class="fas fa-sort"></i></span></th>
                </tr>
                
                <tr>
                    <td class="t-product">Rice (sold in bags)</td>
                    <td class="t-quant">03</td>
                    <td class="t-price">34,600</td>
                    <td class="t-seller">Fashud Mooraje</td>
                    <td class="t-date">05 / 01 / 23</td>
                </tr>

                <tr>
                    <td class="t-product">Flour (sold in bags)</td>
                    <td class="t-quant">06</td>
                    <td class="t-price">134,600</td>
                    <td class="t-seller">Angela White</td>
                    <td class="t-date">17 / 11 / 22</td>
                </tr>

                <tr>
                    <td class="t-product">Beans (sold in bags)</td>
                    <td class="t-quant">01</td>
                    <td class="t-price">12,000</td>
                    <td class="t-seller">Neil Armstrong</td>
                    <td class="t-date">12 / 10 / 22</td>
                </tr>

                <tr>
                    <td class="t-product">Sorghum</td>
                    <td class="t-quant">22</td>
                    <td class="t-price">74,800</td>
                    <td class="t-seller">Georgie Armani</td>
                    <td class="t-date">02 / 08 / 22</td>
                </tr>

            </table>

        </div>

        <div class="table">

            <div class="heading">fulfilled orders</div>

            <table id="myTable2">
                    
                <tr>
                    <th onclick="sortTable2(0)" class="t-product">product <span class="iconic"><i class="fas fa-sort"></i></span></th>
                    <th onclick="sortTable2(1)" class="t-quant">quantity <span class="iconic"><i class="fas fa-sort"></i></span></th>
                    <th onclick="sortTable2(2)" class="t-price">price <span class="iconic"><i class="fas fa-sort"></i></span></th>
                    <th onclick="sortTable2(3)" class="t-seller">farmer <span class="iconic"><i class="fas fa-sort"></i></span></th>
                    <th onclick="sortTable2(4)" class="t-date">Date <span class="iconic"><i class="fas fa-sort"></i></span></th>
                </tr>
                
                <tr>
                    <td class="t-product">Rice (sold in bags)</td>
                    <td class="t-quant">3</td>
                    <td class="t-price">34,600</td>
                    <td class="t-seller">Fashud Mooraje</td>
                    <td class="t-date">05 / 01 / 23</td>
                </tr>

                <tr>
                    <td class="t-product">Flour (sold in bags)</td>
                    <td class="t-quant">6</td>
                    <td class="t-price">134,600</td>
                    <td class="t-seller">Angela White</td>
                    <td class="t-date">17 / 11 / 22</td>
                </tr>

                <tr>
                    <td class="t-product">Beans (sold in bags)</td>
                    <td class="t-quant">1</td>
                    <td class="t-price">12,000</td>
                    <td class="t-seller">Neil Armstrong</td>
                    <td class="t-date">12 / 10 / 22</td>
                </tr>

                <tr>
                    <td class="t-product">Sorghum</td>
                    <td class="t-quant">22</td>
                    <td class="t-price">74,800</td>
                    <td class="t-seller">Georgie Armani</td>
                    <td class="t-date">02 / 08 / 22</td>
                </tr>

            </table>

        </div>

    </div>    

    
    <script src="assets/js/script.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>