<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/homepage.css">
    <link rel="stylesheet" href="style/single-product.css">

    <link rel="stylesheet" href="font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/c79c075354.js" crossorigin="anonymous"></script>

</head>
<body>
<?php include"./includes/header.php" ?>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-img">
            <img src="/img/products/iphone15plus 1.jpg" width="100%" id="mainIMG" alt="">

            <div class="small-img-grp">
                <div class="small-img-col">
                    <img src="/img/products/iphone15plus 1.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="/img/products/iphone15plus 2.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="/img/products/iphone15plus 3.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="/img/products/iphone15plus 4.jpg" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>
        <div class="single-pro-details">
            <h6>iphone section</h6>
            <h4>Iphone 15 Plus</h4>
            <h2>$2000</h2>
            <select>
                <option>Select color</option>
                <option>Black</option>
                <option>White</option>
                <option>Green</option>
                <option>Yellow</option>
                <option>Blue</option>
                <option>Pink</option>
            </select>
            <input type="number" value="1">
            <button class="normal">add to cart</button>
            <h4>Product details</h4>
            <span>viet qq gi do trong daay ik nha</span>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Which SmartPhone Do you Prefer?</p>
        <div class="pro-container">
            <div class="pro">
                <img src="img/products/iphone15promax.jpg" alt="">
                <div class="des">
                    <h5>Iphone 15 Pro Max 1TB Titan Natural</h5>
                    <h4>$2000</h4>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
        
            <div class="pro">
            <img src="img/products/iphone15pro.jpg" alt="">
            <div class="des">
                <h5>Iphone 15 Pro 1TB Titan Blue</h5>
                <h4>$1872</h4>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        
            <div class="pro">
                <img src="img/products/Iphone15.jpg" alt="">
                <div class="des">
                    <h5>Iphone 15 6.1 Inch </h5>
                    <h4>$980</h4>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>

            <div class="pro">
                <img src="img/products/iphone15plus.jpg" alt="">
                <div class="des">
                    <h5>Iphone 15 Plus 256GB Pink</h5>
                    <h4>$1106</h4>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>

        </div>
    </section>


    <script src="/assets/js/products.js"></script>
</body>
</html>