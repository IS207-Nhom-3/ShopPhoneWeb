<?php include "./includes/admin_header.php" ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "./includes/admin_nav.php" ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                   
<?php
if(isset($_GET['source'])){ // Kiểm tra xem trong URL có biến source hay không 
    $source = $_GET['source']; // Đúng thì mình sẽ gán giá trị của nó vào biến source
}else{
    $source = '';//Sai thì gán giá trị rỗng
}
switch( $source) { //Kiểm tra giá trị của biến source
case 'add_posts'; // source = add_posts nó sẽ bao gồm nội dung từ tệp "includes/add_posts.php".
include "includes/add_posts.php";
break;
case 'edit_posts';
include "includes/edit_posts.php";
break;
default: //Trong trường hợp không trùng khớp với bất kỳ giá trị nào trên,nó sẽ bao gồm nội dung từ tệp "includes/view_all_posts.php".
include "includes/view_all_posts.php";
break;
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


