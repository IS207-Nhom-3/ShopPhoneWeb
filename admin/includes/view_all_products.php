<?php include"../db.php" ?>
<table class="table table-bordered table-hover">

<thead>
                            <tr>
                              <th>ID</th>
                              <th>Product Name</th>
                              <th>Regular Price</th>
                              <th>Sale Price</th> 
                              <th>Image</th>  
                              <th>Product Link</th>   
                              <th>Edit</th>
                              <th>Delete</th>  
                            </tr>
                        </thead>
                        <tbody>

<?php
 $query ="SELECT * FROM product";
 $select_product = mysqli_query($connection, $query);
 while ($row = mysqli_fetch_assoc($select_product)){
 $Id = $row['Id'];
 $Product_Name = $row['ProductName'];
 $Regular_Price = $row['RegularPrice'];
 $Sale_Price = $row['SalePrice'];
 $Image = $row['ImageLink'];
 $Product_Link = $row['ProductLink'];
 //Trả ra từng giá trị trong từng   cột
 echo "<tr>";
 echo "<td>$Id</td>";
 echo "<td>{$Product_Name}</td>";
 echo "<td>{$Regular_Price}</td>";
 echo "<td>{$Sale_Price}</td>";
 echo "<td><img width='100' src='$Image' alt='images'></td>";
 echo "<td><a href='$Product_Link'>Link</a></td>";
 
 echo "<td><a href='product.php?source=edit_products&pr_id={$Id}'>Edit</a></td>";
 echo "<td><a href='product.php?delete={$Id}'>Delete</a></td>";
 echo "</tr>";
 }
 ?>
</table>

<?php
if(isset($_GET['delete'])){ 
$the_product_id = $_GET['delete'];
$query = "DELETE FROM product WHERE Id= {$the_product_id}";

$delete_query = mysqli_query($connection, $query);
header("Location: product.php");
}
?>
                            
                     </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>