<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="/style/contact.css"/>
    <link rel="stylesheet" href="/style/general.css"/>
    <link rel="stylesheet" href="font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/c79c075354.js" crossorigin="anonymous"></script>

    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>


  <body>
  <?php include"./includes/header.php" ?>

    <div class="container">
      <span class="big-circle"></span>
      <img src="/img/contact/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Have a question or need help? We're here for you!
          </p>

          <div class="info">
            <div class="information">
              <img src="/img/contact/location.png" class="icon" alt="" />
              <p>Trường Đại học Công Nghệ Thông tin, Q.Thủ Đức, TP.Hồ Chí Minh</p>
            </div>
            <div class="information">
              <img src="/img/contact/email.png" class="icon" alt="" />
              <p>caraphoneshop@contact.com</p>
            </div>
            <div class="information">
              <img src="/img/contact/phone.png" class="icon" alt="" />
              <p>0967692310</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us:</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-pinterest"></i>
              </a>
              
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>
<!-- Form -->
<?php
if(isset($_POST['submit'])){ //Kiểm tra xem nút gửi với thuộc tính name="create_user" đã được nhấn hay chưa
 $contact_username = $_POST['contact_username'];
 $contact_user_email = $_POST['contact_user_email'];
 $contact_user_phone = $_POST['contact_user_phone'];
 $contact_user_message = $_POST['contact_user_message'];
 
 $query = "INSERT INTO contact(contact_username,contact_user_email, contact_user_phone,contact_user_message) ";
 $query .= "VALUES ('{$contact_username}','{$contact_user_email}','{$contact_user_phone}','{$contact_user_message}')";
 $create_contact_query = mysqli_query($connection,$query);//Thực hiện câu truy vấn bằng cách sử dụng hàm mysqli_query.
if(!$create_contact_query ){
die("QUERY FAILED" . mysqli_error($connection));
}
}
?>
          <form action="contact.php" method="post" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="username" name="contact_username" class="input" placeholder="Username" />
            </div>
            <div class="input-container">
              <input type="email" name="contact_user_email" class="input" placeholder="Email" />
            </div>
            <div class="input-container">
              <input type="tel" name="contact_user_phone" class="input" placeholder="Phone" />
            </div>
            <div class="input-container textarea">
              <textarea name="contact_user_message" class="input" placeholder="Message"></textarea>
            </div>
            <input type="submit" name="submit" value="Send" class="btn" />
          </form>
        
        </div>
      </div>
    </div>

    <?php include"./includes/footer.php"?>

    <script src="/assets/js/contact.js"></script>
  </body>
</html>