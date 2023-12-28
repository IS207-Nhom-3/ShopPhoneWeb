<?php
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}
 $query ="SELECT * FROM posts WHERE post_id = $the_post_id ";
 $select_posts_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_posts_by_id)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
}
if(isset($_POST['update_post'])){
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category'];
    $post_user = $_POST['post_user'];
    $post_status = $_POST['post_status'];
   
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
   
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    move_uploaded_file ($post_image_temp,"../images/$post_image");
    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection, $query);
    
        while ($row = mysqli_fetch_array($select_image)){

        $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author }', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = '{$the_post_id}'";
    
    $update_query = mysqli_query($connection, $query);
    
    echo "<p class='bg_success'>Post Updated. <a href='./post.php?p_id={$the_post_id}'>View Post</a> or <a href='post.php'>Edit More Post</a> </p>";
    
}
?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_title ?>" type="text" class="form-control" name="title">
</div>

<div class="form-group">
<label for="category">Category</label>
    <!-- tạo một bảng để chọn categories -->
    <select name="post_category" id="">
        <?php
        $query ="SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);
    
        while ($row = mysqli_fetch_assoc($select_categories)){// duyệt qua từng dòng của bảng và gán vào biến
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        if($cat_id == $post_category_id){
            echo "<option selected value=' $cat_id'>{$cat_title}</option>";
        } else{
            echo "<option value=' $cat_id'>{$cat_title}</option>";
        }
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label for="users">Users</label>
    <select name="post_user" id="">
  <?php  echo "<option value=' $post_user'>{$post_user}</option>"; ?>
        <?php
        $query ="SELECT * FROM users"; // Lấy tất cả các dòng và cột của bảng categories
        $select_users = mysqli_query($connection, $query); // lấy tất cả kết quả đấy từ Database và lưu vào biến
    
        while ($row = mysqli_fetch_assoc($select_users)){// duyệt qua từng dòng của bảng và gán vào biến
        $user_id = $row['user_id'];//Lấy giá trị cat_id và gán vào biến
        $username = $row['username'];//Lấy giá trị cat_title và gán vào biến
        echo "<option value=' $username'>{$username}</option>";//Xuất ra các kết quả của cột cat_title với giá trị là biến cat_id
        // lựa chọn 
        }
        ?>

        
    </select>
</div>

<div class="form-group">
<select name="post_status" id="">
    <option value='draft'><?php echo $post_status; ?></option>
    <?php
    if($post_status == 'published'){
        echo "<option value='draft'>Draft</option>";
    } else {
        echo "<option value='published'>Publish</option>";
    }
    ?>
</select>
</div>

<div class="form-group">
    <img width="100" src="..//images/<?php echo $post_image; ?>" alt="">
    <input type="file"  name="image">
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for="summernote">Post Content</label>
    <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10">
    <?php echo str_replace('\r\n', '</br>', $post_content); ?>
    </textarea>
    
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
</div>
</form>