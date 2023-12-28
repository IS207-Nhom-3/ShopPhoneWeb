
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "./includes/admin_nav.php" ?>
    
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                <?php include "includes/admin_header.php" ?>
<table class="table table-bordered table-hover">
<thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Delete</th>     
                            </tr>
                        </thead>
                        <tbody>

<?php
 $query ="SELECT * FROM contact";
 $select_contact = mysqli_query($connection, $query);
 while ($row = mysqli_fetch_assoc($select_contact)){
 $contact_user_id  = $row['contact_user_id'];
 $contact_username = $row['contact_username'];
 $contact_user_email = $row['contact_user_email'];
 $contact_user_phone = $row['contact_user_phone'];
 $contact_user_message = $row['contact_user_message'];

 //Trả ra từng giá trị trong từng  cột
 echo "<tr>";
 echo "<td>$contact_user_id</td>";
 echo "<td>$contact_username</td>";
 echo "<td>$contact_user_email</td>";
 echo "<td>$contact_user_phone</td>";
 echo "<td>$contact_user_message</td>";
 echo "<td><a href='contact.php?delete={$contact_user_id}'>Delete</a></td>";
 echo "</tr>";
 }
 ?>
</table>
<?php
if(isset($_GET['delete'])){ //Kiểm tra xem delete có trong URL không nếu có thì
$the_contact_id = $_GET['delete'];//giá trị của nó sẽ gán vào biến
$query = "DELETE FROM contact WHERE contact_user_id = {$the_contact_id}";
//Thực hiện câu truy vấn SQL xóa tất cả các dòng trong bảng posts
//Điều kiện là giá trị của cột post_id phải trùng với biến 
$delete_query = mysqli_query($connection, $query);//Thực hiến câu truy vấn...
header("Location: ./contact.php");
}
?>
                    
                 </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "./includes/admin_footer.php" ?>
</div>


</body>