<?php 
include"db.php";
include"./admin/function.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Register</title>

    <link href="/style/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/general.css" />
    <link rel="stylesheet" href="/style/signin.css" />
  </head>

<?php

    if($_SERVER['REQUEST_METHOD'] == "POST") { //Kiểm tra xem biểu mẫu được nhấn chưa
    $username = trim($_POST['username']); // gán kết quả của biểu mẩu vào biến va trim dung de loai bo khoang trang
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    // Khoi tao
    $error = [
        'username' => '',
        'email' => '',
        'password' => ''
    ];

    if(empty(strlen($username))){ 
        $error['username'] = 'Username can not be empty';
    }
    elseif(strlen($username) < 3 ){ // Dem so ki tu < 3
      $error['username'] = 'Username needs to be longer';
    }
    else if(username_exists($username)){ // Ham check username ton tai
      $error['username'] = 'Username already exists ';
    }   
    if(empty(strlen($email))){
      $error['email'] = 'This E-mail can not be empty';
    }
    elseif(email_exists($email)){
      $error['email'] = 'Email already exists ';
    } 
    if(empty(strlen($password)) ){
      $error['password'] = 'This password can not be empty';
    }
  
    foreach($error as $key => $value){ // duyệt qua từng phẩn tử trong mảng
    if(empty($value)){ // Nếu có phẩn tử trống
        unset($error[$key]); //Loại phẩn tử đó khỏi mảng
      }
    } 
    //Nếu không có lỗi nào được phát hiện, thì gọi hàm register_user để đăng ký người dùng với thông tin đã nhập.
    if(empty($error)){
      register_user($username, $email, $password);
    }
   } 
?>

<body>
    <div class="wrapper">
      <div class="form-box login">
        <h2>Register</h2>
        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
          <!--Form username -->
          <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <p style = "font-size:10px;"><?php echo isset($error['username']) ? $error['username']: '' ?></p>
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" >
          </div>
          <!--Form email -->
          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <p><?php echo isset($error['email']) ? $error['email']: '' ?></p>
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" >
          </div>
          <!--Form password -->
          <div class="input-box">
            <span class="icon"><ion-icon name="lock"></ion-icon></span>
            <p ><?php echo isset($error['password']) ? $error['password']: '' ?></p>
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
           
          </div>

          <div class="remember-forget">
            <label>
              <input type="checkbox">
              I agree to the terms [&] conditions
            </label>
          </div>

          <button type="submit" name="register" class="btn">Register</button>

          <div class="login-register">
            <p>
              Already have an account?
              <a href="login.php" class="login-link">Login</a>
            </p>
          </div>
          

        </form>
      </div>
    </div>


    <script src="/assets/js/signin.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
 </body>
</html>
