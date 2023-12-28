<?php 
session_start();
include"./db.php"; 
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<section id="header">
        <a href="#"><img src="/img/logo.png" class="logo" alt=""></a>

        <nav>
            <div class="box">
            <form action="../admin/includes/search_product.php" method="get">
                <input type="text" name="keyword" id="txtInput" placeholder="Search...">
                    <button class="fas fa-search"></button>
            </form>
            </div>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <ul id="navbar" class="topnav">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
                </ul>
 <?php if(isset($_SESSION['username']) ) { //// Kiểm tra nếu người dùng đã đăng nhập
    $loggedInUser = $_SESSION['username'];
    $userRole = $_SESSION['user_role'];
}
    ?>           
           
                
         <!-- Các phần khác của thanh điều hướng -->
     
           <li><a href="cart.php"><i class="fa-solid fa-cart-shopping" style="color:#dfebf6;"></i></a></li>
           <li><a href="login.php"><i class="fa-solid fa-user"></i></a></li>
           <?php if(isset($loggedInUser) ) : ?>
            <div class="user-info">
                <li style="color:#dfebf6;">Welcome, <?php echo $loggedInUser; ?></li>
                <li><a style="color:#dfebf6; text-decoration:none;" href="logout.php">Logout</a></li>
                
                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                    <li><a href="./admin/admin.php">Admin</a></li>
                <?php endif; ?>

    </div>
<?php endif; ?>

    </section>