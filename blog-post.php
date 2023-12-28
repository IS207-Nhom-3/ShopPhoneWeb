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
        </nav>     
    </section>
    <?php if(isset($loggedInUser)): ?>
    <div class="user-info">
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
        <li style="font-size:24px;color:#337ab7;"><a href="./admin/admin.php">Admin</a></li>
        <?php endif; ?>
        <li style="font-size:24px;color:#337ab7;"><a  href="logout.php">Logout</a></li>
    </div>
<?php endif; ?>
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
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <script src="https://kit.fontawesome.com/c79c075354.js" crossorigin="anonymous"></script>

</head>
<body>
  

<?php
$per_page = 2;
if(isset($_GET['page'])){ 
 $page = $_GET['page']; // Nhận giá trí cụ thể biến sẽ nhận giá trị 1,2,3
} else {
    $page = "";
}

if($page == "" || $page == 1){
    $page_1 = 0; 
} else{
    $page_1 = ($page * $per_page) - $per_page;
}

if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ){
    $post_query_count = "SELECT * FROM posts ";
   } else {
    $post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";
   }
// Đếm số lượng bài đăng

$find_count = mysqli_query($connection, $post_query_count);
$count = mysqli_num_rows($find_count);
if($count < 1){
    echo "<h1 class=''text-center>NO POSTS AVAILABLE</h1>";
} else{

$count = ceil($count/$per_page);

$query = "SELECT * FROM posts  LIMIT $page_1, $per_page";
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
    <?php } } ?>

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
               
    <!-- Tạo một phân trang -->
    <ul class="pager">
           <?php    
           for($i = 1; $i <= $count; $i++){          
                echo "<li><a class='active_link' href='blog-post.php?page={$i}'>{$i}</a></li>";
            }
            ?>
        </ul>

    <?php include"./includes/footer.php"; ?>

    <!-- Custom script -->
    <script src="/assets/js/blog.js"></script>
</body>
</html>