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
switch($source) {
    case 'add_users';
    include "includes/add_users.php";
    break;
    default:
    include "includes/view_all_users.php";
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


