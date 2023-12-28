<?php 
ob_start();
session_start();
include"db.php"; 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<section id="header">
        <a href="#"><img src="/img/logo.png" class="logo" alt=""></a>

        <nav>
            <div class="box">
                <input type="text" placeholder="Search...">
                <a href="#">
                    <i class="fas fa-search"></i>
                </a>
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
 <?php if(isset($_SESSION['username'])) { //// Kiểm tra nếu người dùng đã đăng nhập
    $loggedInUser = $_SESSION['username'];
    $userRole = $_SESSION['user_role'];
}
    ?>           
           
                
         <!-- Các phần khác của thanh điều hướng -->
     
           <li><a href="cart.php"><i class="fa-solid fa-cart-shopping" style="color:#dfebf6;margin-top:25px;"></i></a></li>
           <li><a href="login.php"><i class="fa-solid fa-user" style="color:#dfebf6;margin-top:25px;"></i></a></li>
           <?php if(isset($loggedInUser)): ?>
    <div class="user-info">
        <li style="color:#dfebf6;">Welcome, <?php echo $loggedInUser; ?></li>
        <li><a style="color:#dfebf6; text-decoration:none;" href="logout.php">Logout</a></li>
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
        <li><a href="./admin/admin.php">Admin</a></li>
        <?php endif; ?>
    </div>
<?php endif; ?>
                   
    </section>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Post</title>

    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/blog.css">
    

    <link rel="stylesheet" href="font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <script src="https://kit.fontawesome.com/c79c075354.js" crossorigin="anonymous"></script>

</head>
<body>
  


<?php
if(isset($_GET['category'])){
    $post_category_id = $_GET['category'];
}
$query = "SELECT * FROM posts WHERE post_category_id = $post_category_id  ";
$select_all_posts_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_all_posts_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];   
            $post_status = $row['post_status'];
        
?>

    <section class="blog-post section-header-offset">
        <div class="blog-post-container container">
            <div class="blog-post-data">
                 <!-- First Blog Post -->
                <h4 class="title blog-post-title">
                     <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h4>
                <p class="lead">
                by <a href="author_posts.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id;?>"><?php echo $post_author ?></a>
                </p>
                <div class="article-data">
                        <span style="margin:auto;display:block;text-align:center; ">Date: <?php echo $post_date; ?></span>
                    
                </div>
                <a href="post.php?p_id=<?php echo "$post_id" ?>">
                <img class="img-responsive" src="./admin/images/<?php echo $post_image; ?> "alt="">
                </a>
            </div>
                <p>
                <?php echo $post_content; ?>   
                </p>   
        </div>
    </section>
    <?php } ?>
                
    <div class="well categories">
    <!-- Dùng php để gọi loại post từ bảng cơ sở dữ liệu -->
    <?php
     $query ="SELECT * FROM categories";
     $select_categories_sidebar = mysqli_query($connection, $query);
    ?>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
        <?php 
        while ($row = mysqli_fetch_assoc($select_categories_sidebar)){ // duyệt qua từng dòng của bảng
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";}//Xuất ra loại post với link là ví dụ category.php?category=1
        ?>
        </div> 
    </div>
    <!-- /.row -->
</div>
    <?php include"./includes/footer.php"; ?>

    <!-- Custom script -->
    <script src="/assets/js/blog.js"></script>
</body>
</html>