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

                        <h1 class="page-header">
                            Welcome to admin
                            <?php
                    if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];
                    }
                    ?>  
                        </h1>
                        <div class="col-xs-6">

                        <!-- Adding categories -->
                        <?php insert_categories();?>
             
                       <form action="" method="post">
                       <div class="form-group">
                        <label for="cat-title"> Add Category</label>
                        <input type="text" class="form-control" name="cat_title">
                       </div>
                       <div class="form-group">
                        <input class="btb btn-primary" type="submit" name="submit" value="Add category">
                       </div>
                       </form>

                       <?php //Update and include query
                       if(isset($_GET['edit'])){
                        $cat_id = $_GET['edit'];
                        include "./includes/update_categories.php";
                       }
                        ?>
                       </div><!--Add category form -->

                       <div class="col-xs-6">
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
<!--Find all categories -->                                                      
<?php findAllCategories(); ?>

<!--DELETE query -->
<?php deleteCategories(); ?>
                            </tbody>

                        </table>
                       </div>
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

</html>
