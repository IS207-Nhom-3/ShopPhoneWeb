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
    case 'add_products';
    include "includes/add_products.php";
    break;
    case 'edit_products';
    include "includes/edit_products.php";
    break;
    default:
    include "includes/view_all_products.php";
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


