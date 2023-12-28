<?php
if(isset($_GET['pr_id'])){
    $the_product_id = $_GET['pr_id'];
}
 $query ="SELECT * FROM product WHERE Id = $the_product_id ";
 $select_product_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_product_by_id)){
 $Id = $row['Id'];
 $Product_Name = $row['ProductName'];
 $Regular_Price = $row['RegularPrice'];
 $Sale_Price = $row['SalePrice'];
 $Image_Link = $row['ImageLink'];
 $Product_Link = $row['ProductLink'];
}
if(isset($_POST['update_products'])){
    $Product_Name = $_POST['ProductName'];
    $Regular_Price = $_POST['RegularPrice'];
    $Sale_Price = $_POST['SalePrice'];
    $Image_Link = $_POST['ImageLink'];
    $Product_Link = $_POST['ProductLink'];

    $query = "UPDATE product SET ";
    $query .= "ProductName = '{$Product_Name}', ";
    $query .= "RegularPrice = '{$Regular_Price}', ";
    $query .= "SalePrice = '{$Sale_Price}', ";
    $query .= "ImageLink = '{$Image_Link}', ";
    $query .= "ProductLink = '{$Product_Link}' ";
    $query .= "WHERE Id = '{$the_product_id}'";
    
    $update_query = mysqli_query($connection, $query);
    
    echo "<p class='bg_success'>Post Updated. <a href='./product.php?pr_id={$the_product_id}'>View Product</a> or <a href='product.php'>Edit More Product</a> </p>";
}
    ?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="name">Product Name</label>
    <input value="<?php echo $Product_Name ?>" type="text" class="form-control" name="ProductName">
</div>

<div class="form-group">
    <label for="r-price">Regular Price</label>
    <input value="<?php echo $Regular_Price ?>" type="text" class="form-control" name="RegularPrice">
</div>

<div class="form-group">
    <label for="s-price">Sale Price</label>
    <input value="<?php echo $Sale_Price ?>" type="text" class="form-control" name="SalePrice">
</div>

<div class="form-group">
    <label for="i-link">ImageLink</label>
    <input value="<?php echo $Image_Link ?>" type="text" class="form-control" name="ImageLink">
</div>


<div class="form-group">
    <label for="p-link">ProductLink</label>
    <input value="<?php echo $Product_Link ?>" type="text" class="form-control" name="ProductLink">
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_products" value="Update Product">
</div>

</form>