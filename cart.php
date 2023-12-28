<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check out</title>

    <link rel="stylesheet" href="style/general.css">
	<link rel="stylesheet" href="style/checkout.css">

    <link rel="stylesheet" href="font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/c79c075354.js" crossorigin="anonymous"></script>

</head>
<body>

    <?php include"./includes/header.php";?>

    <div class="container">

        <div class="checkoutLayout">

            <div class="returnCart">
                <h1>Your shopping cart</h1>
                <div class="list">

                    <div class="item">
                        <img src="/img/products/iphone13.jpg">
                        <div class="info">
                            <div class="name">PRODUCT 1</div>
                            <div class="price">$22/1 product</div>
                        </div>
                        <div class="quantity">5</div>
                        <div class="returnPrice">$433.3</div>
                    </div>

                </div>
                <div class="bill-info">
                    <h1>Billing information</h1>
                    <div class="form">
                        <div class="group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name">
                        </div>
            
                        <div class="group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone">
                        </div>
            
                        <div class="group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address">
                        </div>
            
                        <div class="group">
                            <label for="country">Country</label>
                            <select name="country" id="country">
                                <option value="">Choose..</option>
                                <option value="">VietNam</option>
                            </select>
                        </div>
            
                        <div class="group">
                            <label for="city">City</label>
                            <select name="city" id="city">
                                <option value="">Choose..</option>
                                <option value="">HCM</option>
                                <option value="">HN</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>


            <div class="right">
                <h1>Checkout</h1>

                <div class="return">
                    <div class="row">
                        <div>Total Quantity</div>
                        <div class="totalQuantity">70</div>
                    </div>
                    <div class="row">
                        <div>Shipping cost</div>
                        <div class="shippingCost">$20</div>
                    </div>
                    <div class="row">
                        <div>Total Price</div>
                        <div class="totalPrice">$900</div>
                    </div>
                </div>
                <button class="buttonCheckout">CHECKOUT</button>
                </div>
        </div>
    </div>

    <?php include"./includes/footer.php"; ?>


</body>
</html>