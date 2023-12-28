
<?php
if(isset($_POST['create_post'])){ //Kiểm tra xem nút gửi với thuộc tính name="create_post" đã được nhấn hay chưa
 $post_title = $_POST['title'];//Lấy dữ liệu từ biểu mẫu có name là title và gán vào biến $post_title
 $post_author = $_POST['post_user'];
 $post_category_id = $_POST['post_category'];
 $post_status = $_POST['post_status'];

 $post_image = $_FILES['image']['name'];
 $post_image_temp = $_FILES['image']['tmp_name'];
 //$_FILES['image']: Là một mảng chứa thông tin về tệp tin được tải lên thông qua trường <input type="file" name="image"> 
//['name']: Là một phần của mảng $_FILES['image'], chứa tên của tệp tin được tải lên trên máy tính của người dùng.

 $post_tags = $_POST['post_tags'];
 $post_content = $_POST['post_content'];
 $post_date = date('d-m-y');
 

 move_uploaded_file($post_image_temp,"images/$post_image");
 //Di chuyển tệp ảnh từ vị trí tạm thời (được lưu trữ trong $_FILES['image']['tmp_name']) đến vị trí cố định trên máy chủ.

 $query = "INSERT INTO posts(post_category_id,post_title,post_author,
 post_date,post_image,post_content,post_tags,post_status) ";
 //Chuẩn bị câu truy vấn SQL để chèn dữ liệu vào bảng "posts".
 $query .= "VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),
 '{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
 // Giá trị của mỗi trường được lấy từ biểu mẫu.
 $create_post_query = mysqli_query($connection,$query);//Thực hiện câu truy vấn bằng cách sử dụng hàm mysqli_query.
if(!$create_post_query ){
die("QUERY FAILED" . mysqli_error($connection));
}
}
?>
<!--   tạo một cái form với dữ liệu sẽ gửi đến chính trang hiện tại và phương thức gửi đi là post và nó sẽ gửi 
không chỉ dữ liệu văn bản thông thường mà còn dữ liệu nhị phân (binary),
chẳng hạn như hình ảnh, âm thanh, hoặc tệp tin khác. -->
<form action="" method="post" enctype="multipart/form-data">
<!-- Title -->
<div class="form-group">
    <label for="title">Post Title</label><!-- Nội dung cũa nhãn là post title-->
    <!-- Thuộc tính for liên kết nhãn với một trường nhập dữ liệu (input field) thông qua giá trị của thuộc tính id của trường đó.-->
    <input type="text" id="title" class="form-control" name="title">
</div>
<!-- Category -->
<div class="form-group">
    <!-- tạo một bảng để lua chọn loại post nào --> 
    <label for="category">Category</label>
    <select name="post_category" id="">
        <?php
        $query ="SELECT * FROM categories"; // Lấy tất cả các dòng và cột của bảng categories
        $select_categories = mysqli_query($connection, $query); // lấy tất cả kết quả đấy từ Database và lưu vào biến
    
        while ($row = mysqli_fetch_assoc($select_categories)){// duyệt qua từng dòng của bảng và gán vào biến
        $cat_id = $row['cat_id'];//Lấy giá trị cat_id và gán vào biến
        $cat_title = $row['cat_title'];//Lấy giá trị cat_title và gán vào biến
        echo "<option value=' $cat_id'>{$cat_title}</option>";//Xuất ra các kết quả của cột cat_title với giá trị là biến cat_id
        // lựa chọn 
        }
        ?>
    </select>
</div>
<!-- Users -->
<div class="form-group">
    <!-- tạo một bảng để lua chọn loại post nào --> 
    <label for="users">Users</label>
    <select name="post_user" id="">
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
<!-- Tạo một lựa chọn của trạng thái: bản nháp hoặc xuất bản -->
<div class="form-group">
    <select name="post_status" id="post_status">
    <option value="draft">Post Status</option>
    <option value="published">Publish</option>
    <option value="draft">Draft</option>
    </select>
</div>
<!-- Image -->
<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" id="post_image"  name="image">
</div>
<!-- Tags -->
<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" id="post_tags" class="form-control" name="post_tags">
</div>
<!--Content-->
<div class="form-group">
    <label for="summernote">Post Content</label>
    <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10"></textarea>
</div>
<!--Create Post-->
<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
</div>
</form>