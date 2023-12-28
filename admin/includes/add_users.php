
<?php
if(isset($_POST['create_user'])){ //Kiểm tra xem nút gửi với thuộc tính name="create_user" đã được nhấn hay chưa
 $user_firstname = $_POST['user_firstname'];
 $user_lastname = $_POST['user_lastname'];
 $user_role = $_POST['user_role'];
 $username = $_POST['username'];
 $user_email = $_POST['user_email'];
 $user_password = $_POST['user_password'];

 $query = "INSERT INTO users(user_firstname,user_lastname, user_role, username, user_email, user_password) ";
 $query .= "VALUES ('{$user_firstname}','{$user_lastname}',
 '{$user_role}','{$username}','{$user_email}','{$user_password}')";
 $create_user_query = mysqli_query($connection,$query);//Thực hiện câu truy vấn bằng cách sử dụng hàm mysqli_query.
if(!$create_user_query ){
die("QUERY FAILED" . mysqli_error($connection));
}
echo "User Created: " . " " . "<a href='users.php'>View Users</a>";
}
?>

<!--   tạo một cái form với dữ liệu sẽ gửi đến chính trang hiện tại và phương thức gửi đi là post và nó sẽ gửi 
không chỉ dữ liệu văn bản thông thường mà còn dữ liệu nhị phân (binary),
chẳng hạn như hình ảnh, âm thanh, hoặc tệp tin khác. -->
<form action="" method="post" enctype="multipart/form-data">
    <!-- Firstname -->
<div class="form-group">
    <label for="firstname">Firstname</label>
    <input type="text" id="firstname" class="form-control" name="user_firstname">
</div>
    <!-- Lastname -->
<div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" id="lastname" class="form-control" name="user_lastname">
</div>
    <!-- Role -->
<div class="form-group">
    <select name="user_role" id="">
       <option value="subscriber">Select Options</option>;
        <option value="admin">Admin</option>;
        <option value="subscriber">Subscriber</option>;       
    </select>
</div>
    <!-- Username -->
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" class="form-control" name="username">
</div>
    <!-- Email -->
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" class="form-control" name="user_email">
</div>
    <!-- Password -->
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" class="form-control" name="user_password">
</div>
    <!-- Submit -->
<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Add Users">
</div>
</form>