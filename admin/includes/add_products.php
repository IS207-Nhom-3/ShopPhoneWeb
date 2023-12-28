
<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
  <style>
    /* CSS cho biểu mẫu */
    .form-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    .form-input {
      display: block;
      margin-bottom: 10px;
      width: 95%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    .form-button {
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>

</head>

<body>
<?php
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "web";
$conn = new mysqli('localhost','root','','web','3305');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['add_products'])){
$Product_Name = $_POST["productName"];
$Product_Price = $_POST["productPrice"];
$Sale_Price = $_POST["SalePrice"];
$Image_Link = $_POST["productImageLink"];
$Product_Link = $_POST["productLink"];
// execute SQL
$stmt = $conn->prepare("INSERT INTO product(ProductName, RegularPrice, SalePrice, ImageLink, ProductLink) 
VALUES ('" . $Product_Name . "','" . $Product_Price . "','" . $Sale_Price . "','" . $Image_Link . "','" . $Product_Link . "')");
if ($stmt->execute()) {
    echo "Product Created: <a href='product.php'>View Products</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
}
// Close the database connection
$conn->close();
?>

  <div class="form-container">
    <h2>Add Product</h2>
      <form action="" method="post" enctype="multipart/form-data">
      <input type="text" class="form-input" name="productName" placeholder="ProductName">
      <input type="text" class="form-input" name="productPrice" placeholder="Price">
      <input type="text" class="form-input" name="SalePrice" placeholder="SalePrice">
      <input type="text" class="form-input" name="productImageLink" placeholder="ImageLink">
      <input type="text" class="form-input" name="productLink" placeholder="ProductLink">
      <button type="submit" class="form-button" name="add_products" id="btnCreate">Add</button>
      </form>
  </div>