
<!-- Header -->
<?php 
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

<?php include("./admin/function.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Post</title>

    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/blog.css">
    

    <link rel="stylesheet" href="font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <script src="https://kit.fontawesome.com/c79c075354.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php 
     if(isset($_GET['p_id'])) {
        $the_post_id =  $_GET['p_id'];     
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'published'";   
        $select_all_posts_query = mysqli_query($connection, $query);
           if(mysqli_num_rows($select_all_posts_query) < 1){
               echo "<h1 class=''text-center>NO POSTS AVAILABLE</h1>";
           } else {
            while ($row = mysqli_fetch_assoc($select_all_posts_query)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
            }
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
            </section>
        
                <!-- Blog Comments -->
                <?php
                if(isset($_POST['create_comment'])){
                    
                    $the_post_id =  $_GET['p_id'];
                    $comment_author =  $_POST['comment_author'];
                    $comment_email =  $_POST['comment_email'];
                    $comment_content =  $_POST['comment_content'];

                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content ) ){
                $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_date)";
                $query .= " VALUES($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', NOW())";
                $create_comment_query = mysqli_query($connection, $query);


                    } else {
                        echo "<script>alert('Fields could not be empty')</script>";
                    }
                    header("Location: post.php?p_id=$the_post_id");
                }
                ?>
                <div class="comment-form">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">

                         <div class="comment-form-group">
                            <label for="Author">Author</label>
                            <input type="text"  class="form-control" name="comment_author" >
                        </div>
                        <div class="comment-form-group">
                            <label for="Author">Email</label>
                            <input type="email" class="form-control"  name="comment_email" >
                        </div>
                        <div class="comment-form-group">
                        <label for="comment">Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>  
                        <button type="submit" class="submit-btn" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
<?php
$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= "ORDER BY comment_id DESC";

$select_comment_query = mysqli_query($connection,$query);
if(!$select_comment_query){
    die('QUERY FAILED' . mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($select_comment_query)){
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_author = $row['comment_author'];
?>
                <!-- Comment -->
                <div class="author d-grid">
                    <div class="author-about">
                        <h3 class="author-name"><?php echo $comment_author; ?></h3>
                        <small style="color:black;"><?php echo $comment_date; ?></small>
                            <p><?php echo $comment_content; ?></p>
                    
                        <ul class="list social-media">
                            <li class="list-item">
                                <a href="#" class="list-link"><i class="ri-instagram-line"></i></a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="list-link"><i class="ri-facebook-circle-line"></i></a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="list-link"><i class="ri-twitter-line"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

<?php }}}else {
    header("Location: ./blog-post.php");
} ?>
<?php include"./includes/footer.php"; ?>
</body>
</html>