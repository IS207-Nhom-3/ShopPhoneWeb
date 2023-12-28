<?php
 session_start();
 ob_start();
 include "db.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Login</title>
    <link href="/style/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/general.css" />
    <link rel="stylesheet" href="/style/signin.css" />
  </head>

<?php

    if(isset($_POST['login'])){
// Lấy dữ liệu từ form đăng nhập
    $username = $_POST['username'];
    $password = $_POST['password'];

// Kiểm tra thông tin đăng nhập
    $query = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password'";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_role = $row['user_role'];
    }
    if ($result->num_rows > 0) {
   // Đăng nhập thành công
    $_SESSION['username'] = $username;//lưu tên người đăng nhập vào session
    $_SESSION['user_role'] = $user_role; //lưu role vào session
    header("Location: index.php?u_id=$user_id");
    exit;
  } else {
   // Đăng nhập không thành công
    header("Location:login.php");
  }

   // Đóng kết nối
    $connection->close();
  }
?> 
  <body>
    <div class="wrapper">
      <div class="form-box login">
        <h2>Login</h2>
        <form role="form" action="login.php" method="post" id="login-form" autocomplete="off">
         <!--Form username -->
        <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" >
          </div>
        <!--Form password -->
          <div class="input-box">
            <span class="icon"><ion-icon name="lock"></ion-icon></span>
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
          </div>

          <div class="remember-forget">
            <label>
              <input type="checkbox">
              Remember me
            </label>
            <a href="#">Forgot Password</a>
          </div>

          <button type="submit" name="login" class="btn">Login</button>

          <div class="login-register">
            <p>
              Don't have an account?
              <a href="registration.php" class="register-link">Register</a>
            </p>
          </div>
        </form>
      </div>
    </div>


    <script src="/assets/js/signin.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  </body>
</html>
